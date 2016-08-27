<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Core\Contracts\ImageFactoryInterface;
use Controlqtime\Core\Contracts\LegalRepresentativeRepoInterface;
use Controlqtime\Core\Contracts\TypeCompanyRepoInterface;
use Controlqtime\Http\Requests\CompanyRequest;
use Controlqtime\Core\Contracts\CommuneRepoInterface;
use Controlqtime\Core\Contracts\CompanyRepoInterface;
use Controlqtime\Core\Contracts\NationalityRepoInterface;
use Controlqtime\Core\Contracts\ProvinceRepoInterface;
use Controlqtime\Core\Contracts\RegionRepoInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{
	/**
	 * @var CommuneRepoInterface
	 */
	protected $commune;
	/**
	 * @var CompanyRepoInterface
	 */
	protected $company;
	/**
	 * @var ImageFactoryInterface
	 */
	protected $image;
	/**
	 * @var NationalityRepoInterface
	 */
	protected $nationality;
	/**
	 * @var ProvinceRepoInterface
	 */
	protected $province;
	/**
	 * @var RegionRepoInterface
	 */
	protected $region;
	/**
	 * @var TypeCompanyRepoInterface
	 */
	protected $type_company;
	/**
	 * @var LegalRepresentativeRepoInterface
	 */
	protected $legalRepresentative;

	/**
	 * CompanyController constructor.
	 * @param TypeCompanyRepoInterface $type_company
	 * @param CompanyRepoInterface $company
	 * @param NationalityRepoInterface $nationality
	 * @param RegionRepoInterface $region
	 * @param ProvinceRepoInterface $province
	 * @param CommuneRepoInterface $commune
	 * @param ImageFactoryInterface $image
	 * @param LegalRepresentativeRepoInterface $legalRepresentative
	 */
	public function __construct(TypeCompanyRepoInterface $type_company, CompanyRepoInterface $company, NationalityRepoInterface $nationality, RegionRepoInterface $region, ProvinceRepoInterface $province, CommuneRepoInterface $commune, ImageFactoryInterface $image, LegalRepresentativeRepoInterface $legalRepresentative)
	{
		$this->commune                = $commune;
		$this->company                = $company;
		$this->image                  = $image;
		$this->nationality            = $nationality;
		$this->province               = $province;
		$this->region                 = $region;
		$this->type_company           = $type_company;
		$this->legalRepresentative    = $legalRepresentative;
	}

	/**
	 * @return mixed for Bootstrap Table
	 */
	public function getCompanies()
	{
		$companies = $this->company->all();

		return $companies;
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		return view('administration.companies.index');
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function create()
	{
		$nationalities        = $this->nationality->lists('name', 'id');
		$regions              = $this->region->lists('name', 'id');
		$provinces            = $this->province->lists('name', 'id');
		$communes             = $this->commune->lists('name', 'id');
		$type_companies       = $this->type_company->lists('name', 'id');

		return view('administration.companies.create', compact(
			'nationalities', 'regions', 'provinces', 'communes', 'type_companies'
		));
	}

	/**
	 * @param CompanyRequest $request
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function store(CompanyRequest $request)
	{
		dd($request->all());
		DB::beginTransaction();

		try {
			// $company 				= $this->company->create($request->all());
			$this->legalRepresentative->create($request->all());
			// $company->legalRepresentative()->associate($legalRepresentative);

			DB::commit();
		}catch ( Exception $e ) {
			DB::rollback();
		}

		return response()->json(array(
			'success' => true,
			'url'     => '/administration/companies'
		));

	}

	/**
	 * @param $id
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function edit($id)
	{
		$company              = $this->company->find($id, ['representativeCompanies']);
		$regions              = $this->region->lists('name', 'id');
		$provinces            = $this->region->findProvinces($company->commune->province->region->id);
		$communes             = $this->province->findCommunes($company->commune->province->id);
		$nationalities        = $this->nationality->lists('name', 'id');
		$type_companies       = $this->type_company->lists('name', 'id');

		return view('administration.companies.edit', compact(
			'representativeCompanies.typeRepresentative', 'company', 'regions', 'provinces',
			'communes', 'nationalities', 'type_companies'
		));
	}

	/**
	 * @param CompanyRequest $request
	 * @param $id
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function update(CompanyRequest $request, $id)
	{
		$company = $this->company->find($id);
		$this->company->update($request->all(), $id);
		$this->legalRepresentative->destroyArrayId($request->get('id_delete_representatives'));
		$this->legalRepresentative->createOrUpdateWithArray($request->all(), $company);

		return response()->json(array(
			'success' => true,
			'url'     => '/administration/companies'
		));

	}

	/**
	 * @param $id
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function show($id)
	{
		$company = $this->company->find($id, ['commune.province.region', 'legalRepresentatives.nationality', 'typeCompany']);

		return view('administration.companies.show', compact('company'));
	}

	/**
	 * @param $id
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function destroy($id)
	{
		$this->company->delete($id);

		return redirect()->route('administration.companies.index');
	}

	/**
	 * @param $id
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function getImages($id)
	{
		$company = $this->company->find($id, ['imageRolCompanies', 'imagePatentCompanies']);

		return view('administration.companies.upload', compact('id', 'company'));
	}

	/**
	 * @param Request $request
	 * @return \Illuminate\Http\JsonResponse
	 */
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

	/**
	 * @param Request $request
	 * @return \Illuminate\Http\JsonResponse
	 */
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