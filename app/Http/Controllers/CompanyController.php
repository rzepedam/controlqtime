<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Core\Contracts\ImageFactoryInterface;
use Controlqtime\Core\Contracts\TypeCompanyRepoInterface;
use Controlqtime\Core\Contracts\TypeRepresentativeRepoInterface;
use Controlqtime\Http\Requests\CompanyRequest;
use Controlqtime\Core\Contracts\CommuneRepoInterface;
use Controlqtime\Core\Contracts\CompanyRepoInterface;
use Controlqtime\Core\Contracts\RepresentativeCompanyRepoInterface;
use Controlqtime\Core\Contracts\NationalityRepoInterface;
use Controlqtime\Core\Contracts\ProvinceRepoInterface;
use Controlqtime\Core\Contracts\RegionRepoInterface;
use Controlqtime\Http\Requests;
use Illuminate\Http\Request;

class CompanyController extends Controller {

	protected $commune;
	protected $company;
	protected $image;
	protected $nationality;
	protected $province;
	protected $region;
	protected $representative_company;
	protected $type_company;
	protected $type_representative;

	public function __construct(TypeCompanyRepoInterface $type_company, CompanyRepoInterface $company, NationalityRepoInterface $nationality, RegionRepoInterface $region, ProvinceRepoInterface $province, CommuneRepoInterface $commune, RepresentativeCompanyRepoInterface $representative_company, TypeRepresentativeRepoInterface $type_representative, ImageFactoryInterface $image)
	{
		$this->commune                = $commune;
		$this->company                = $company;
		$this->image                  = $image;
		$this->representative_company = $representative_company;
		$this->nationality            = $nationality;
		$this->province               = $province;
		$this->region                 = $region;
		$this->type_company           = $type_company;
		$this->type_representative    = $type_representative;
	}

	public function index()
	{
		return view('administration.companies.index');
	}

	public function getCompanies()
	{
		$companies = $this->company->all();

		return $companies;
	}

	public function create()
	{
		$nationalities        = $this->nationality->lists('name', 'id');
		$regions              = $this->region->lists('name', 'id');
		$provinces            = $this->province->lists('name', 'id');
		$communes             = $this->commune->lists('name', 'id');
		$type_companies       = $this->type_company->lists('name', 'id');
		$type_representatives = $this->type_representative->lists('name', 'id');

		return view('administration.companies.create', compact(
			'nationalities', 'regions', 'provinces', 'communes', 'type_companies',
			'type_representatives'
		));
	}

	public function store(CompanyRequest $request)
	{
		$company = $this->company->create($request->all());
		$this->representative_company->createOrUpdateWithArray($request->all(), $company);

		return response()->json(array(
			'success' => true,
			'url'     => '/administration/companies'
		));

	}

	public function edit($id)
	{
		$company              = $this->company->find($id, ['representativeCompanies']);
		$regions              = $this->region->lists('name', 'id');
		$provinces            = $this->region->findProvinces($company->commune->province->region->id);
		$communes             = $this->province->findCommunes($company->commune->province->id);
		$nationalities        = $this->nationality->lists('name', 'id');
		$type_companies       = $this->type_company->lists('name', 'id');
		$type_representatives = $this->type_representative->lists('name', 'id');

		return view('administration.companies.edit', compact(
			'representativeCompanies.typeRepresentative', 'company', 'regions', 'provinces', 'communes', 'nationalities', 'type_companies',
			'type_representatives'
		));
	}

	public function update(CompanyRequest $request, $id)
	{
		$company = $this->company->find($id);
		$this->company->update($request->all(), $id);
		$this->representative_company->destroyArrayId($request->get('id_delete_representatives'));
		$this->representative_company->createOrUpdateWithArray($request->all(), $company);

		return response()->json(array(
			'success' => true,
			'url'     => '/administration/companies'
		));

	}

	public function show($id)
	{
		$company = $this->company->find($id, ['commune.province.region', 'representativeCompanies.nationality', 'typeCompany']);

		return view('administration.companies.show', compact('company'));
	}

	public function destroy($id)
	{
		$this->company->delete($id);

		return redirect()->route('administration.companies.index');
	}

	public function getImages($id)
	{
		$company = $this->company->find($id, ['imageRolCompanies', 'imagePatentCompanies']);
		
		return view('administration.companies.upload', compact('id', 'company'));
	}

	public function addImages(Request $request)
	{
		$save = $this->image->build($request->get('type'), null, $request->get('company_id'), $request->file('file_data'), null)->addImages();

		if ( $save )
		{
			$this->company->checkState($request->get('company_id'));

			return response()->json(['success' => true]);
		}

		return response()->json(['success' => false]);
	}

	public function deleteFiles(Request $request)
	{
		$destroy = $this->image->build($request->get('type'), null, $request->get('key'), null, $request->get('path'))->destroyImage();

		if ( $destroy )
		{
			$this->company->checkState($request->get('id'));

			return response()->json(['success' => true]);
		}

		return response()->json(['success' => false]);
	}

}