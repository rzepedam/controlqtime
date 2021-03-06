<?php

namespace Controlqtime\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Log\Writer as Log;
use Illuminate\Support\Facades\DB;
use Controlqtime\Core\Entities\Area;
use Controlqtime\Core\Entities\Region;
use Controlqtime\Core\Entities\Address;
use Controlqtime\Core\Entities\Commune;
use Controlqtime\Core\Entities\Company;
use Controlqtime\Core\Entities\Province;
use Controlqtime\Core\Entities\DetailAddressCompany;
use Controlqtime\Core\Entities\DetailAddressLegalEmployee;
use Controlqtime\Core\Entities\LegalRepresentative;
use Controlqtime\Core\Entities\Nationality;
use Controlqtime\Core\Entities\TypeCompany;
use Controlqtime\Core\Factory\ImageFactory;
use Controlqtime\Http\Requests\CompanyRequest;
use Controlqtime\Core\Entities\ActivateCompany;

class CompanyController extends Controller
{
	/**
	 * @var ActivateCompany
	 */
	protected $activateCompany;

	/**
	 * @var Address
	 */
	protected $address;

	/**
	 * @var Area
	 */
	protected $area;

	/**
	 * @var Commune
	 */
	protected $commune;

	/**
	 * @var Company
	 */
	protected $company;

	/**
	 * @var DetailAddressCompany
	 */
	protected $detailAddressCompany;

	/**
	 * @var DetailAddressLegalEmployee
	 */
	protected $detailAddressLegal;

	/**
	 * @var LegalRepresentative
	 */
	protected $legalRepresentative;

	/**
	 * @var Log
	 */
	protected $log;

	/**
	 * @var Nationality
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
	 * @param Area                       $area
	 * @param ActivateCompany            $activateCompany
	 * @param Address                    $address
	 * @param Commune                    $commune
	 * @param Company                    $company
	 * @param DetailAddressCompany       $detailAddressCompany
	 * @param DetailAddressLegalEmployee $detailAddressLegal
	 * @param LegalRepresentative        $legalRepresentative
	 * @param Log                        $log
	 * @param Nationality                $nationality
	 * @param Province                   $province
	 * @param Region                     $region
	 * @param TypeCompany                $typeCompany
	 */
	public function __construct(Area $area, ActivateCompany $activateCompany, Address $address,
	                            Commune $commune, Company $company, DetailAddressCompany $detailAddressCompany,
	                            DetailAddressLegalEmployee $detailAddressLegal, LegalRepresentative $legalRepresentative,
	                            Log $log, Nationality $nationality, Province $province, Region $region, TypeCompany $typeCompany)
	{
		$this->activateCompany      = $activateCompany;
		$this->address              = $address;
		$this->area                 = $area;
		$this->commune              = $commune;
		$this->company              = $company;
		$this->detailAddressCompany = $detailAddressCompany;
		$this->detailAddressLegal   = $detailAddressLegal;
		$this->legalRepresentative  = $legalRepresentative;
		$this->log                  = $log;
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
		$areas         = $this->area->pluck('name', 'id');
		$nationalities = $this->nationality->pluck('name', 'id');
		$regionsColl   = $this->region->all();
		$provincesColl = $this->region->findOrFail($regionsColl->first()->id)->provinces;
		$communes      = $this->province->findOrFail($provincesColl->first()->id)->communes->pluck('name', 'id');
		$provinces     = $provincesColl->pluck('name', 'id');
		$regions       = $regionsColl->pluck('name', 'id');
		$typeCompanies = $this->typeCompany->pluck('name', 'id');

		return view('administration.companies.create', compact(
			'areas', 'communes', 'nationalities', 'provinces', 'regions', 'typeCompanies'
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

		try {
			$company = $this->company->create($request->all());
			$address = $company->address()->create($request->all());
			$address->detailAddressCompany()->create($request->all());
			$request = $this->changeNamePhoneCommuneAndAddressFieldsToLegalRepresentativeForFillableInPolymorphicTable($request->all());
			$legal   = $company->legalRepresentative()->create($request);
			$address = $legal->address()->create($request);
			$address->detailAddressLegalEmployee()->create($request);
			$company->syncAreas(request('area_id'));
			session()->flash('success', 'El registro fue almacenado satisfactoriamente.');
			DB::commit();

			return response()->json([ 'status' => true, 'url' => '/administration/companies' ]);
		} catch (Exception $e) {
			$this->log->error('Error Store Company: ' . $e->getMessage());
			DB::rollback();

			return response()->json([ 'status' => false ]);
		}
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
		$company = $this->company->with([
			'legalRepresentative.address.commune.province.region', 'address.commune.province.region',
			'legalRepresentative.address.detailAddressCompany', 'areas'
		])->findOrFail($id);

		$areas          = $this->area->pluck('name', 'id');
		$regionsColl    = $this->region->all();
		$regions        = $regionsColl->pluck('name', 'id');
		$provinces      = $this->region->findOrFail($company->address->commune->province->region->id)->provinces->pluck('name', 'id');
		$communes       = $this->province->findOrFail($company->address->commune->province->id)->communes->pluck('name', 'id');
		$provincesLegal = $this->region->findOrFail($company->legalRepresentative->address->commune->province->region->id)->provinces->pluck('name', 'id');
		$communesLegal  = $this->province->findOrFail($company->legalRepresentative->address->commune->province->id)->communes->pluck('name', 'id');
		$nationalities  = $this->nationality->pluck('name', 'id');
		$typeCompanies  = $this->typeCompany->pluck('name', 'id');

		return view('administration.companies.edit', compact(
			'areas', 'company', 'regions', 'provinces', 'provincesLegal', 'communes', 'communesLegal', 'nationalities',
			'typeCompanies'
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

		try {
			$company = $this->company->findOrFail($id);
			$company->update($request->all());
			$company->address->update($request->all());
			$company->address->detailAddressCompany->update($request->all());
			$request = $this->changeNamePhoneCommuneAndAddressFieldsToLegalRepresentativeForFillableInPolymorphicTable($request->all());
			$company->legalRepresentative->update($request);
			$company->legalRepresentative->address->update($request);
			$company->legalRepresentative->address->detailAddressLegalEmployee->update($request);
			$company->syncAreas(request('area_id'));
			session()->flash('success', 'El registro fue actualizado satisfactoriamente.');
			DB::commit();

			return response()->json([ 'status' => true, 'url' => '/administration/companies' ]);
		} catch (Exception $e) {
			$this->log->error('Error Update Company: ' . $e->getMessage());
			DB::rollback();

			return response()->json([ 'status' => false ]);
		}
	}

	/**
	 * @param $id
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function show($id)
	{
		$company = $this->company->with([
			'address.commune.province.region', 'legalRepresentative.nationality', 'typeCompany',
			'address.detailAddressLegalEmployee', 'address.detailAddressCompany', 'areas'
		])->findOrFail($id);

		return view('administration.companies.show', compact('company'));
	}

	/**
	 * @param $id
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function destroy($id)
	{
		DB::beginTransaction();

		try {
			$this->company->destroy($id);
			session()->flash('success', 'El registro fue eliminado satisfactoriamente.');
			DB::commit();

			return redirect()->route('companies.index');
		} catch (Exception $e) {
			$this->log->error('Error Delete Company: ' . $e->getMessage());
			DB::rollback();

			return response()->json([ 'status' => false ]);
		}
	}

	/**
	 * @param $id
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function getImages($id)
	{
		$company = $this->company->with([ 'imageable' ])->findOrFail($id);

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

		if ($save) {
			$this->activateCompany->checkStateCompany($request->get('company_id'));

			return response()->json([
				'status' => true,
			]);
		}

		return response()->json([
			'status' => false,
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

		if ($destroy) {
			$this->activateCompany->checkStateCompany($request->get('id'));

			return response()->json([
				'status' => true,
			]);
		}

		return response()->json([
			'status' => false,
		]);
	}
}
