<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Http\Requests;
use Controlqtime\Http\Requests\CompanyRequest;
use Controlqtime\Core\Contracts\CommuneRepoInterface;
use Controlqtime\Core\Contracts\CompanyRepoInterface;
use Controlqtime\Core\Contracts\LegalRepresentativeRepoInterface;
use Controlqtime\Core\Contracts\NationalityRepoInterface;
use Controlqtime\Core\Contracts\ProvinceRepoInterface;
use Controlqtime\Core\Contracts\RegionRepoInterface;
use Controlqtime\Core\Contracts\SubsidiaryRepoInterface;

class CompanyController extends Controller
{
    protected $commune;
    protected $company;
    protected $legal_representative;
    protected $nationality;
    protected $province;
    protected $region;
    protected $subsidiary;

    public function __construct(CompanyRepoInterface $company, NationalityRepoInterface $nationality, RegionRepoInterface $region, ProvinceRepoInterface $province, CommuneRepoInterface $commune, LegalRepresentativeRepoInterface $legal_representative, SubsidiaryRepoInterface $subsidiary)
    {
        $this->commune              = $commune;
        $this->company              = $company;
        $this->legal_representative = $legal_representative;
        $this->nationality          = $nationality;
        $this->province             = $province;
        $this->region               = $region;
        $this->subsidiary           = $subsidiary;
    }

    public function index()
    {
        $companies = $this->company->all();
        return view('maintainers.companies.index', compact('companies'));
    }

    public function create()
    {
        $nationalities  = $this->nationality->lists('name', 'id');
        $regions        = $this->region->lists('name', 'id');
        $provinces      = $this->province->lists('name', 'id');
        $communes       = $this->commune->lists('name', 'id');

        return view('maintainers.companies.create', compact(
            'nationalities', 'regions', 'provinces', 'communes'
        ));
    }

    public function store(CompanyRequest $request)
    {
        $company = $this->company->create($request->all());
        $this->legal_representative->createWithSave($request->all(), $company);
        $this->subsidiary->createWithSave($request->all(), $company);

        if ($request->ajax()) {
            return response()->json(array(
                'success'   => true,
                'url'       => '/maintainers/companies'
            ));
        }

        return redirect()->back();

    }
    
    public function edit($id)
    {
        $company        = $this->company->find($id, ['subsidiaries.commune.province.region']);
        $regions        = $this->region->lists('name', 'id');
        $provinces      = $this->province->lists('name', 'id');
        $communes       = $this->commune->lists('name', 'id');
        $nationalities  = $this->nationality->lists('name', 'id');

        return view('maintainers.companies.edit', compact(
            'company', 'regions', 'provinces', 'communes', 'nationalities'
        ));

        /*$company        = Company::with(['legalRepresentatives', 'subsidiaries'])->findOrFail($id);
        $regions        = Region::lists('name', 'id');
        $region         = Commune::find($company->commune_id)->province->region;
        $provinces      = Region::find($region->id)->provinces->lists('name', 'id');
        $province       = Commune::find($company->commune_id)->province;
        $communes       = Province::find($province->id)->communes->lists('name', 'id');
        $nationalities  = Nationality::lists('name', 'id');

        if (count($company->subsidiaries) > 0) {
            $subsidiary = $company->subsidiaries;
            for ($i = 0; $i < count($company->subsidiaries); $i++) {
                $region_sub[$i] = Commune::find($subsidiary[$i]->commune_id)->province->region;
                $provinces_sub[$i] = Region::find($region_sub[$i]->id)->provinces->lists('name', 'id');
                $province_sub[$i] = Commune::find($subsidiary[$i]->commune_id)->province;
                $communes_sub[$i] = Province::find($province_sub[$i]->id)->communes->lists('name', 'id');
            }
        }

        return view('maintainers.companies.edit', compact(
            'company', 'regions', 'region', 'provinces', 'province', 'communes',
            'nationalities', 'region_sub', 'provinces_sub', 'province_sub', 'communes_sub'
        ));*/
    }


    /**
     * @param CompanyRequest $request
     *
     * @param $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(CompanyRequest $request, $id)
    {
        $company = Company::findOrFail($id);
        $company->fill($request->all());
        $company->save();

        /*
         * Delete legal representive
         */

        if ($request->get('id_deletes_legal') != '')
            $this->deleteLegalRepresentative($request->get('id_deletes_legal'));

        for ($i = 0; $i < $request->get('count_legal_representative'); $i++) {

            /*
             * New Legal Representative ID = 0
             */

            if ($request->get('id' . $i) == '0') {
                $legal = new LegalRepresentative();
                $legal->company()->associate($company);
            } else {

                /*
                 * Update legal Representative ID <> 0
                 */

                $legal = LegalRepresentative::find($request->get('id' . $i));
            }

            $legal->male_surname = $request->get('male_surname' . $i);
            $legal->female_surname = $request->get('female_surname' . $i);
            $legal->first_name = $request->get('first_name' . $i);
            $legal->second_name = $request->get('second_name' . $i);
            $legal->rut = $request->get('rut' . $i);
            $legal->birthday = $request->get('birthday' . $i);
            $legal->nationality_id = $request->get('nationality_id' . $i);
            $legal->email = $request->get('email' . $i);
            $legal->phone1 = $request->get('phone1-' . $i);
            $legal->phone2 = $request->get('phone2-' . $i);
            $legal->save();
        }

        /*
         * Delete subsidiaries
         */

        if ($request->get('id_deletes_subsidiary') != '')
            $this->deleteSubsidiary($request->get('id_deletes_subsidiary'));

        for ($i = 0; $i < $request->get('count_subsidiary'); $i++) {

            /*
             * New subsidiary
             */

            if ($request->get('id_suc' . $i) == '0') {
                $subsidiary = new Subsidiary();
                $subsidiary->company()->associate($company);
            } else {

                /*
                 * Update Subsidiary
                 */
                
                $subsidiary = Subsidiary::find($request->get('id_suc' . $i));
            }

            $subsidiary->address = $request->get('address_suc' . $i);
            $subsidiary->commune_id = $request->get('commune_suc_id' . $i);
            $subsidiary->num = $request->get('num_suc' . $i);
            $subsidiary->lot = $request->get('lot_suc' . $i);
            $subsidiary->ofi = $request->get('ofi_suc' . $i);
            $subsidiary->floor = $request->get('floor_suc' . $i);
            $subsidiary->muni_license = $request->get('muni_license_suc' . $i);
            $subsidiary->email = $request->get('email_suc' . $i);
            $subsidiary->phone1 = $request->get('phone1_suc-' . $i);
            $subsidiary->phone2 = $request->get('phone2_suc-' . $i);
            $subsidiary->save();
        }

        $message = 'El registro ' . $company->firm_name . ' fue actualizado satisfactoriamente.';
        Session::flash('success', $message);
        $response = array(
            'status' => 'success',
            'url' => '/maintainers/companies'
        );

        return response()->json([$response], 200);
    }


    /**
     * @param $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $company = Company::with(['legalRepresentatives', 'subsidiaries'])->find($id);
        return view('maintainers.companies.show', compact('company'));
    }


    /**
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $company = Company::findOrFail($id);
        $company->delete();
        Session::flash('success', 'El registro ' . $company->name . ' fue eliminado satisfactoriamente.');
        return redirect()->route('maintainers.companies.index');
    }


    /**
     *
     * @param string $ids
     *
     */
    public function deleteLegalRepresentative($ids)
    {
        $delete = explode(',', $ids);
        for ($i = 0; $i < count($delete); $i++) {
            $legal = LegalRepresentative::find($delete[$i]);
            $legal->delete();
        }
    }

    /**
     *
     * @param string $ids
     *
     */
    public function deleteSubsidiary($ids)
    {
        $delete = explode(',', $ids);
        for ($i = 0; $i < count($delete); $i++) {
            $subsidiary = Subsidiary::find($delete[$i]);
            $subsidiary->delete();
        }
    }

}