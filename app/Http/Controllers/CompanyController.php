<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Core\Contracts\ImagePatentCompanyRepoInterface;
use Controlqtime\Core\Contracts\ImageRolCompanyRepoInterface;
use Controlqtime\Http\Requests;
use Controlqtime\Http\Requests\CompanyRequest;
use Controlqtime\Core\Contracts\CommuneRepoInterface;
use Controlqtime\Core\Contracts\CompanyRepoInterface;
use Controlqtime\Core\Contracts\LegalRepresentativeRepoInterface;
use Controlqtime\Core\Contracts\NationalityRepoInterface;
use Controlqtime\Core\Contracts\ProvinceRepoInterface;
use Controlqtime\Core\Contracts\RegionRepoInterface;
use Controlqtime\Core\Contracts\SubsidiaryRepoInterface;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    protected $commune;
    protected $company;
    protected $image_patent;
    protected $image_rol;
    protected $legal_representative;
    protected $nationality;
    protected $province;
    protected $region;
    protected $subsidiary;

    public function __construct(CompanyRepoInterface $company, NationalityRepoInterface $nationality, RegionRepoInterface $region, ProvinceRepoInterface $province, CommuneRepoInterface $commune, LegalRepresentativeRepoInterface $legal_representative, SubsidiaryRepoInterface $subsidiary, ImageRolCompanyRepoInterface $image_rol, ImagePatentCompanyRepoInterface $image_patent)
    {
        $this->commune              = $commune;
        $this->company              = $company;
        $this->image_patent         = $image_patent;
        $this->image_rol            = $image_rol;
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
        $this->legal_representative->createOrUpdateWithArray($request->all(), $company);
        $this->subsidiary->createOrUpdateWithArray($request->all(), $company);

        if ($request->ajax()) {
            return response()->json(array(
                'success'   => true,
                'url'       => '/maintainers/companies'
            ));
        }

        return redirect()->route('maintainers.companies.index');

    }
    
    public function edit($id)
    {
        $company        = $this->company->find($id, ['subsidiaries.commune.province.region', 'legalRepresentatives']);
        $regions        = $this->region->lists('name', 'id');
        $provinces      = $this->region->findProvinces($company->commune->province->region->id);
        $communes       = $this->province->findCommunes($company->commune->province->id);
        $nationalities  = $this->nationality->lists('name', 'id');
        
        /*$i = 0;
        foreach ($company->subsidiaries as $subsidiary) {
            $prov_sel[$i]       = $this->region->findProvinces($subsidiary->commune->province->region->id);
            $i++;
        }*/

        return view('maintainers.companies.edit', compact(
            'company', 'regions', 'provinces', 'communes', 'nationalities',
            'prov_sel'
        ));
    }

    public function update(CompanyRequest $request, $id)
    {
        $company = $this->company->find($id);
        $this->company->update($request->all(), $id);
        $this->legal_representative->destroyWithArray($request->get('id_deletes_legal'));
        $this->subsidiary->destroyWithArray($request->get('id_deletes_subsidiary'));
        $this->legal_representative->createOrUpdateWithArray($request->all(), $company);
        $this->subsidiary->createOrUpdateWithArray($request->all(), $company);

        if ($request->ajax()) {
            return response()->json(array(
                'success'   => true,
                'url'       => '/maintainers/companies'
            ));
        }

        return redirect()->route('maintainers.companies.index');
    }

    public function show($id)
    {
        $company = $this->company->find($id, ['commune.province.region', 'legalRepresentatives.nationality', 'subsidiaries.commune.province.region']);
        return view('maintainers.companies.show', compact('company'));
    }

    public function destroy($id)
    {
        $this->company->delete($id);
        return redirect()->route('maintainers.companies.index');
    }
    
    public function getImages($id)
    {
        $company = $this->company->find($id, ['imageRolCompanies', 'imagePatentCompanies']);
        return view('maintainers.companies.upload', compact('id', 'company'));
    }
    
    public function addImages(Request $request)
    {
        switch ($request->get('type'))
        {
            case 'rol':
                $save = $this->image_rol->addImages('company', $request->file('file_data'), $request->get('id'), $request->get('type'));
                break;
            
            case 'patent':
                $save = $this->image_patent->addImages('company', $request->file('file_data'), $request->get('id'), $request->get('type'));
                break;
        }

        if ($save) {
            $this->company->checkStatus($request->get('id'));
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false]);
    }
    
    public function deleteFiles(Request $request)
    {
        switch ($request->get('type'))
        {
            case 'rol':
                $destroy = $this->image_rol->destroyImage('company', $request->get('id'), $request->get('type'), $request->get('img_name'));
                $this->image_rol->delete($request->get('key'));
                break;

            case 'patent':
                $destroy = $this->image_patent->destroyImage('company', $request->get('id'), $request->get('type'), $request->get('img_name'));
                $this->image_patent->delete($request->get('key'));
                break;
        }

        if ($destroy) {
            $this->company->checkStatus($request->get('id'));
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false]);
    }
    
}