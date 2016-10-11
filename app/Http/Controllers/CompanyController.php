<?php

namespace Controlqtime\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Controlqtime\Http\Requests\CompanyRequest;
use Controlqtime\Core\Contracts\RegionRepoInterface;
use Controlqtime\Core\Contracts\AddressRepoInterface;
use Controlqtime\Core\Contracts\CommuneRepoInterface;
use Controlqtime\Core\Contracts\CompanyRepoInterface;
use Controlqtime\Core\Contracts\ImageFactoryInterface;
use Controlqtime\Core\Contracts\ProvinceRepoInterface;
use Controlqtime\Core\Contracts\NationalityRepoInterface;
use Controlqtime\Core\Contracts\TypeCompanyRepoInterface;
use Controlqtime\Core\Contracts\LegalRepresentativeRepoInterface;
use Controlqtime\Core\Contracts\DetailAddressCompanyRepoInterface;
use Controlqtime\Core\Contracts\DetailAddressLegalEmployeeRepoInterface;

class CompanyController extends Controller
{
	/**
	 * @var AddressRepoInterface
	 */
	protected $address;
	
	/**
	 * @var CommuneRepoInterface
	 */
	protected $commune;
	
	/**
	 * @var CompanyRepoInterface
	 */
	protected $company;
	
	/**
	 * @var DetailAddressCompanyRepoInterface
	 */
	protected $detail_address_company;
	
	/**
	 * @var DetailAddressLegalEmployeeRepoInterface
	 */
	protected $detail_address_legal;
	
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
	 *
	 * @param TypeCompanyRepoInterface $type_company
	 * @param CompanyRepoInterface $company
	 * @param NationalityRepoInterface $nationality
	 * @param RegionRepoInterface $region
	 * @param ProvinceRepoInterface $province
	 * @param CommuneRepoInterface $commune
	 * @param ImageFactoryInterface $image
	 * @param LegalRepresentativeRepoInterface $legalRepresentative
	 * @param AddressRepoInterface $address
	 * @param DetailAddressCompanyRepoInterface $detail_address_company
	 * @param DetailAddressLegalEmployeeRepoInterface $detail_address_legal
	 *
	 * @internal param DetailAddressCompanyRepoInterface $detail_address
	 */
	public function __construct(TypeCompanyRepoInterface $type_company, CompanyRepoInterface $company, NationalityRepoInterface $nationality, RegionRepoInterface $region, ProvinceRepoInterface $province, CommuneRepoInterface $commune, ImageFactoryInterface $image, LegalRepresentativeRepoInterface $legalRepresentative, AddressRepoInterface $address, DetailAddressCompanyRepoInterface $detail_address_company, DetailAddressLegalEmployeeRepoInterface $detail_address_legal)
	{
		$this->address                = $address;
		$this->commune                = $commune;
		$this->company                = $company;
		$this->image                  = $image;
		$this->nationality            = $nationality;
		$this->province               = $province;
		$this->region                 = $region;
		$this->type_company           = $type_company;
		$this->legalRepresentative    = $legalRepresentative;
		$this->detail_address_company = $detail_address_company;
		$this->detail_address_legal   = $detail_address_legal;
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
		$nationalities  = $this->nationality->lists('name', 'id');
		$regionsColl    = $this->region->all();
		$provincesColl  = $this->region->find($regionsColl->first()->id)->provinces;
		$communes       = $this->province->findCommunes($provincesColl->first()->id);
		$regions        = $regionsColl->pluck('name', 'id');
		$provinces      = $provincesColl->pluck('name', 'id');
		$type_companies = $this->type_company->lists('name', 'id');
		
		return view('administration.companies.create', compact(
			'nationalities', 'regions', 'provinces', 'communes', 'type_companies'
		));
	}
	
	/**
	 * @param CompanyRequest $request
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function store(CompanyRequest $request)
	{
		DB::beginTransaction();
		
		try
		{
			$company = $this->company->create($request->all());
			$address = $company->address()->create($request->all());
			$address->detailAddressCompany()->create($request->all());
			$request = $this->changeNamePhoneCommuneAndAddressFieldsToLegalRepresentativeForFillableInPolymorphicTable($request->all());
			$legal   = $company->legalRepresentative()->create($request);
			$address = $legal->address()->create($request);
			$address->detailAddressLegalEmployee()->create($request);
			
			DB::commit();
		} catch (Exception $e)
		{
			DB::rollback();
		}
		
		return response()->json([
			'success' => true,
			'url'     => '/administration/companies'
		]);
		
	}
	
	/**
	 * @param array $request
	 *
	 * @return array
	 */
	private function changeNamePhoneCommuneAndAddressFieldsToLegalRepresentativeForFillableInPolymorphicTable(array $request)
	{
		$request['phone1']     = $request['phone1_representative'];
		$request['phone2']     = $request['phone2_representative'];
		$request['commune_id'] = $request['commune_legal_id'];
		$request['address']    = $request['address_representative'];
		unset($request['phone1_representative']);
		unset($request['phone2_representative']);
		unset($request['commune_legal_id']);
		unset($request['address_representative']);
		
		return $request;
	}
	
	/**
	 * @param $id
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function edit($id)
	{
		$company = $this->company->find($id, [
			'legalRepresentative.address.commune.province.region', 'address.commune.province.region'
		]);
		
		$regionsColl      = $this->region->all();
		$provincesCollCom = $this->region->find($company->address->commune->province->region->id)->provinces;
		$provincesCom     = $provincesCollCom->pluck('name', 'id');
		$communesCom      = $this->province->findCommunes($company->address->commune->province->id);
		$provincesCollRep = $this->region->find($company->legalRepresentative->address->commune->province->region->id)->provinces;
		$provincesRep     = $provincesCollRep->pluck('name', 'id');
		$communesRep      = $this->province->findCommunes($company->legalRepresentative->address->commune->province->id);
		$regions          = $regionsColl->pluck('name', 'id');
		$nationalities    = $this->nationality->lists('name', 'id');
		$type_companies   = $this->type_company->lists('name', 'id');
		
		return view('administration.companies.edit', compact(
			'company', 'regions', 'provincesCom', 'provincesRep', 'communesCom', 'communesRep', 'nationalities',
			'type_companies'
		));
	}
	
	/**
	 * @param CompanyRequest $request
	 * @param $id
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function update(CompanyRequest $request, $id)
	{
		DB::beginTransaction();
		
		try
		{
			$company = $this->company->update($request->all(), $id);
			$address = $this->address->update($request->all(), $company->address->id);
			$this->detail_address_company->update($request->all(), $address->detailAddressCompany->id);
			$request = $this->changeNamePhoneCommuneAndAddressFieldsToLegalRepresentativeForFillableInPolymorphicTable($request->all());
			$legal = $this->legalRepresentative->update($request, $company->legalRepresentative->id);
			$address = $this->address->update($request, $legal->address->id);
			$this->detail_address_legal->update($request, $address->detailAddressLegalEmployee->id);
			
			DB::commit();
		} catch (Exception $e)
		{
			DB::rollback();
		}
		
		return response()->json([
			'success' => true,
			'url'     => '/administration/companies'
		]);
	}
	
	/**
	 * @param $id
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function show($id)
	{
		$company = $this->company->find($id, [
			'address.commune.province.region', 'legalRepresentative.nationality', 'typeCompany',
			'address.detailAddressLegalEmployee', 'address.detailAddressCompany'
		]);
		
		return view('administration.companies.show', compact('company'));
	}
	
	/**
	 * @param $id
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function destroy($id)
	{
		$this->company->delete($id);
		
		return redirect()->route('companies.index');
	}
	
	/**
	 * @param $id
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function getImages($id)
	{
		$company = $this->company->find($id, ['imageRolCompanies', 'imagePatentCompanies']);
		
		return view('administration.companies.upload', compact('id', 'company'));
	}
	
	/**
	 * @param Request $request
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function addImages(Request $request)
	{
		$save = $this->image->build($request->get('type'), $request->get('company_id'), null, $request->file('file_data'), null)->addImages();
		
		if ($save)
		{
			$this->company->checkState($request->get('company_id'));
			
			return response()->json([
				'success' => true
			]);
		}
		
		return response()->json([
			'success' => false
		]);
	}
	
	/**
	 * @param Request $request
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function deleteFiles(Request $request)
	{
		$destroy = $this->image->build($request->get('type'), $request->get('key'), null, null, $request->get('path'))->destroyImage();
		
		if ($destroy)
		{
			$this->company->checkState($request->get('id'));
			
			return response()->json([
				'success' => true
			]);
		}
		
		return response()->json([
			'success' => false
		]);
	}
	
}