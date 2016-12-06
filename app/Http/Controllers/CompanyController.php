<?php

namespace Controlqtime\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Controlqtime\Core\Entities\Region;
use Controlqtime\Core\Entities\Commune;
use Controlqtime\Core\Entities\Company;
use Controlqtime\Core\Entities\Province;
use Controlqtime\Core\Entities\TypeCompany;
use Controlqtime\Core\Factory\ImageFactory;
use Controlqtime\Http\Requests\CompanyRequest;
use Controlqtime\Core\Entities\ActivateCompany;
use Controlqtime\Core\Contracts\AddressRepoInterface;
use Controlqtime\Core\Contracts\NationalityRepoInterface;
use Controlqtime\Core\Contracts\LegalRepresentativeRepoInterface;
use Controlqtime\Core\Contracts\DetailAddressCompanyRepoInterface;
use Controlqtime\Core\Contracts\DetailAddressLegalEmployeeRepoInterface;

class CompanyController extends Controller
{
	/**
	 * @var ActivateCompany
	 */
	protected $activateCompany;
	
	/**
	 * @var AddressRepoInterface
	 */
	protected $address;
	
	/**
	 * @var Commune
	 */
	protected $commune;
	
	/**
	 * @var Company
	 */
	protected $company;
	
	/**
	 * @var DetailAddressCompanyRepoInterface
	 */
	protected $detailAddressCompany;
	
	/**
	 * @var DetailAddressLegalEmployeeRepoInterface
	 */
	protected $detailAddressLegal;
	
	/**
	 * @var LegalRepresentativeRepoInterface
	 */
	protected $legalRepresentative;
	
	/**
	 * @var NationalityRepoInterface
	 */
	protected $nationality;
	
	/**
	 * @var Province
	 */
	protected $province;
	
	/**
	 * @var Region
	 */
	protected $region;
	
	/**
	 * @var TypeCompany
	 */
	protected $typeCompany;
	
	
	/**
	 * CompanyController constructor.
	 *
	 * @param ActivateCompany                         $activateCompany
	 * @param AddressRepoInterface                    $address
	 * @param Commune                                 $commune
	 * @param Company                                 $company
	 * @param DetailAddressCompanyRepoInterface       $detailAddressCompany
	 * @param DetailAddressLegalEmployeeRepoInterface $detailAddressLegal
	 * @param LegalRepresentativeRepoInterface        $legalRepresentative
	 * @param NationalityRepoInterface                $nationality
	 * @param Province                                $province
	 * @param Region                                  $region
	 * @param TypeCompany                             $typeCompany
	 */
	public function __construct(ActivateCompany $activateCompany, AddressRepoInterface $address,
		Commune $commune, Company $company, DetailAddressCompanyRepoInterface $detailAddressCompany,
		DetailAddressLegalEmployeeRepoInterface $detailAddressLegal,
		LegalRepresentativeRepoInterface $legalRepresentative, NationalityRepoInterface $nationality,
		Province $province, Region $region, TypeCompany $typeCompany)
	{
		$this->activateCompany      = $activateCompany;
		$this->address              = $address;
		$this->commune              = $commune;
		$this->company              = $company;
		$this->detailAddressCompany = $detailAddressCompany;
		$this->detailAddressLegal   = $detailAddressLegal;
		$this->legalRepresentative  = $legalRepresentative;
		$this->nationality          = $nationality;
		$this->province             = $province;
		$this->region               = $region;
		$this->typeCompany          = $typeCompany;
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
		$type_companies = $this->typeCompany->lists('name', 'id');
		
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
		} catch ( Exception $e )
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
		$type_companies   = $this->typeCompany->lists('name', 'id');
		
		return view('administration.companies.edit', compact(
			'company', 'regions', 'provincesCom', 'provincesRep', 'communesCom', 'communesRep', 'nationalities',
			'type_companies'
		));
	}
	
	/**
	 * @param CompanyRequest $request
	 * @param                $id
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
			$this->detailAddressCompany->update($request->all(), $address->detailAddressCompany->id);
			$request = $this->changeNamePhoneCommuneAndAddressFieldsToLegalRepresentativeForFillableInPolymorphicTable($request->all());
			$legal   = $this->legalRepresentative->update($request, $company->legalRepresentative->id);
			$address = $this->address->update($request, $legal->address->id);
			$this->detailAddressLegal->update($request, $address->detailAddressLegalEmployee->id);
			
			DB::commit();
		} catch ( Exception $e )
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
		$company = $this->company->find($id, [
			'imagesable'
		]);
		
		return view('administration.companies.upload', compact('id', 'company'));
	}
	
	/**
	 * @param Request $request
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function addImages(Request $request)
	{
		$save = new ImageFactory($request->get('company_id'), 'company/', $request->get('repo_id'), $request->get('type'), $request->file('file_data'), null, $request->get('subClass'));
		
		if ( $save )
		{
			$this->activateCompany->checkStateCompany($request->get('company_id'));
			
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
		$destroy = new ImageFactory($request->get('key'), 'company/', null, $request->get('type'), null, $request->get('path'));
		
		if ( $destroy )
		{
			$this->activateCompany->checkStateCompany($request->get('id'));
			
			return response()->json([
				'success' => true
			]);
		}
		
		return response()->json([
			'success' => false
		]);
	}
	
}