<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Core\Contracts\TypeCompanyRepoInterface;
use Controlqtime\Core\Contracts\TypeRepresentativeRepoInterface;
use Controlqtime\Http\Requests\CompanyRequest;
use Controlqtime\Core\Contracts\CommuneRepoInterface;
use Controlqtime\Core\Contracts\CompanyRepoInterface;
use Controlqtime\Core\Contracts\ImagePatentCompanyRepoInterface;
use Controlqtime\Core\Contracts\ImageRolCompanyRepoInterface;
use Controlqtime\Core\Contracts\RepresentativeCompanyRepoInterface;
use Controlqtime\Core\Contracts\NationalityRepoInterface;
use Controlqtime\Core\Contracts\ProvinceRepoInterface;
use Controlqtime\Core\Contracts\RegionRepoInterface;
use Controlqtime\Http\Requests;
use Illuminate\Http\Request;
use Controlqtime\Core\Contracts\SubsidiaryRepoInterface;

class CompanyController extends Controller {

	protected $commune;
	protected $company;
	protected $image_patent;
	protected $image_rol;
	protected $representative_company;
	protected $nationality;
	protected $province;
	protected $region;
	protected $type_company;
	protected $type_representative;

	public function __construct(TypeCompanyRepoInterface $type_company, CompanyRepoInterface $company, NationalityRepoInterface $nationality, RegionRepoInterface $region, ProvinceRepoInterface $province, CommuneRepoInterface $commune, RepresentativeCompanyRepoInterface $representative_company, ImageRolCompanyRepoInterface $image_rol, ImagePatentCompanyRepoInterface $image_patent, TypeRepresentativeRepoInterface $type_representative)
	{
		$this->commune                = $commune;
		$this->company                = $company;
		$this->image_patent           = $image_patent;
		$this->image_rol              = $image_rol;
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

	public function getCompanies() {
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
		switch ($request->get('type'))
		{
			case 'rol':
				$save = $this->image_rol->addImages('company', $request->file('file_data'), $request->get('id'), $request->get('type'));
				break;

			case 'patent':
				$save = $this->image_patent->addImages('company', $request->file('file_data'), $request->get('id'), $request->get('type'));
				break;
		}

		if ( $save )
		{
			$this->company->checkState($request->get('id'));

			return response()->json(['success' => true]);
		}

		return response()->json(['success' => false]);
	}

	public function deleteFiles(Request $request)
	{
		switch ($request->get('type'))
		{
			case 'rol':
				$destroy = $this->image_rol->destroyImage($request->get('path'));
				$this->image_rol->delete($request->get('key'));
				break;

			case 'patent':
				$destroy = $this->image_patent->destroyImage($request->get('path'));
				$this->image_patent->delete($request->get('key'));
				break;
		}

		if ( $destroy )
		{
			$this->company->checkState($request->get('id'));

			return response()->json(['success' => true]);
		}

		return response()->json(['success' => false]);
	}

}