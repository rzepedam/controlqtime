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
        $company        = $this->company->find($id, ['subsidiaries.commune.province.region']);
        $regions        = $this->region->lists('name', 'id');
        $provinces      = $this->region->find($company->commune->province->region->id);
        $communes       = $this->province->find($company->commune->province->id);
        $nationalities  = $this->nationality->lists('name', 'id');

        return view('maintainers.companies.edit', compact(
            'company', 'regions', 'provinces', 'communes', 'nationalities'
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
        $company = Company::with(['legalRepresentatives', 'subsidiaries'])->find($id);
        return view('maintainers.companies.show', compact('company'));
    }

    public function destroy($id)
    {
        $this->company->delete($id);
        return redirect()->route('maintainers.companies.index');
    }

}