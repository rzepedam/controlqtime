<?php

namespace Controlqtime\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Controlqtime\Core\Entities\Fuel;
use Controlqtime\Core\Entities\Company;
use Controlqtime\Core\Entities\Vehicle;
use Controlqtime\Core\Entities\Trademark;
use Controlqtime\Core\Entities\DetailBus;
use Controlqtime\Core\Entities\TypeVehicle;
use Controlqtime\Core\Factory\ImageFactory;
use Controlqtime\Core\Entities\ModelVehicle;
use Controlqtime\Core\Entities\StateVehicle;
use Controlqtime\Core\Entities\DetailVehicle;
use Controlqtime\Http\Requests\VehicleRequest;
use Controlqtime\Core\Entities\ActivateVehicle;
use Controlqtime\Core\Entities\DateDocumentationVehicle;

class VehicleController extends Controller
{
	/**
	 * @var ActivateVehicle
	 */
	protected $activateVehicle;
	
	/**
	 * @var Company
	 */
	protected $company;
	
	/**
	 * @var DateDocumentationVehicle
	 */
	protected $dateDocumentationVehicle;
	
	/**
	 * @var DetailBus
	 */
	protected $detailBus;
	
	/**
	 * @var DetailVehicle
	 */
	protected $detailVehicle;
	
	/**
	 * @var Fuel
	 */
	protected $fuel;
	
	/**
	 * @var ModelVehicle
	 */
	protected $modelVehicle;
	
	/**
	 * @var Trademark
	 */
	protected $trademark;
	
	/**
	 * @var TypeVehicle
	 */
	protected $typeVehicle;
	
	/**
	 * @var StateVehicle
	 */
	protected $stateVehicle;
	
	/**
	 * @var Vehicle
	 */
	protected $vehicle;
	
	/**
	 * VehicleController constructor.
	 *
	 * @param ActivateVehicle          $activateVehicle
	 * @param Company                  $company
	 * @param DateDocumentationVehicle $dateDocumentationVehicle
	 * @param DetailBus                $detailBus
	 * @param DetailVehicle            $detailVehicle
	 * @param Fuel                     $fuel
	 * @param ModelVehicle             $modelVehicle
	 * @param StateVehicle             $stateVehicle
	 * @param Trademark                $trademark
	 * @param TypeVehicle              $typeVehicle
	 * @param Vehicle                  $vehicle
	 */
	public function __construct(ActivateVehicle $activateVehicle, Company $company,
		DateDocumentationVehicle $dateDocumentationVehicle, DetailBus $detailBus,
		DetailVehicle $detailVehicle, Fuel $fuel, ModelVehicle $modelVehicle,
		StateVehicle $stateVehicle, Trademark $trademark, TypeVehicle $typeVehicle,
		Vehicle $vehicle)
	{
		$this->activateVehicle          = $activateVehicle;
		$this->company                  = $company;
		$this->dateDocumentationVehicle = $dateDocumentationVehicle;
		$this->detailBus                = $detailBus;
		$this->detailVehicle            = $detailVehicle;
		$this->fuel                     = $fuel;
		$this->modelVehicle             = $modelVehicle;
		$this->trademark                = $trademark;
		$this->typeVehicle              = $typeVehicle;
		$this->stateVehicle             = $stateVehicle;
		$this->vehicle                  = $vehicle;
	}
	
	/**
	 * @return mixed for Bootstrap-Table
	 */
	public function getVehicles()
	{
		$vehicles = $this->vehicle->all(['typeVehicle', 'modelVehicle']);
		
		return $vehicles;
	}
	
	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		return view('operations.vehicles.index', compact('vehicles'));
	}
	
	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function create()
	{
		$companies     = $this->company->whereLists('state', 'enable', 'firm_name');
		$fuels         = $this->fuel->lists('name', 'id');
		$modelVehicles = $this->modelVehicle->lists('name', 'id');
		$stateVehicles = $this->stateVehicle->lists('name', 'id');
		$trademarks    = $this->trademark->lists('name', 'id');
		$typeVehicles  = $this->typeVehicle->lists('name', 'id');
		
		return view('operations.vehicles.create', compact(
			'trademarks', 'modelVehicles', 'typeVehicles', 'fuels', 'companies', 'stateVehicles'
		));
	}
	
	/**
	 * @param VehicleRequest $request
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function store(VehicleRequest $request)
	{
		$request->request->add(['user_id' => auth()->user()->id]);
		DB::beginTransaction();
		
		try
		{
			$vehicle       = $this->vehicle->create($request->all());
			$detailVehicle = $vehicle->detailVehicle()->create($request->all());
			
			if ( $request->get('typeVehicle_id') == 2 )
			{
				$detailVehicle->detailBus()->create($request->all());
			}
			
			$vehicle->dateDocumentationVehicle()->create($request->all());
			
			DB::commit();
		} catch ( Exception $e )
		{
			DB::rollback();
		}
		
		return response()->json([
			'success' => true,
			'url'     => '/operations/vehicles'
		]);
		
	}
	
	/**
	 * @param $id
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function edit($id)
	{
		$vehicle       = $this->vehicle->find($id, ['modelVehicle.trademark']);
		$trademarks    = $this->trademark->lists('name', 'id');
		$modelVehicles = $this->trademark->findModelVehicles($vehicle->modelVehicle->trademark->id);
		$typeVehicles  = $this->typeVehicle->whereLists('id', $vehicle->typeVehicle_id, 'name');
		$companies     = $this->company->whereLists('state', 'enable', 'firm_name');
		$fuels         = $this->fuel->lists('name', 'id');
		$stateVehicles = $this->stateVehicle->lists('name', 'id');
		
		return view('operations.vehicles.edit', compact(
			'vehicle', 'typeVehicles', 'trademarks', 'modelVehicles', 'companies', 'fuels', 'stateVehicles'
		));
	}
	
	/**
	 * @param VehicleRequest $request
	 * @param                $id
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function update(VehicleRequest $request, $id)
	{
		DB::beginTransaction();
		
		try
		{
			$vehicle       = $this->vehicle->update($request->all(), $id);
			$detailVehicle = $this->detailVehicle->update($request->all(), $vehicle->detailVehicle->id);
			
			if ( $request->get('typeVehicle_id') == 2 )
			{
				$this->detailBus->update($request->all(), $detailVehicle->detailBus->id);
			}
			
			$this->dateDocumentationVehicle->update($request->all(), $vehicle->dateDocumentationVehicle->id);
			
			DB::commit();
		} catch ( Exception $e )
		{
			DB::rollback();
		}
		
		return response()->json([
			'success' => true,
			'url'     => '/operations/vehicles'
		]);
	}
	
	/**
	 * @param $id
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function show($id)
	{
		$vehicle = $this->vehicle->find($id, [
			'modelVehicle', 'typeVehicle', 'detailVehicle.detailBus', 'company', 'user.employee'
		]);
		
		return view('operations.vehicles.show', compact('vehicle'));
	}
	
	/**
	 * @param $id
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function destroy($id)
	{
		$this->vehicle->delete($id);
		
		return redirect()->route('vehicles.index');
	}
	
	/**
	 * @param $id
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function getImages($id)
	{
		$vehicle = $this->vehicle->find($id);
		
		return view('operations.vehicles.upload', compact('id', 'vehicle'));
	}
	
	/**
	 * @param Request $request
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function addImages(Request $request)
	{
		$save = new ImageFactory($request->get('vehicle_id'), 'vehicle/', $request->get('repo_id'), $request->get('type'), $request->file('file_data'), null, $request->get('subClass'));
		
		if ( $save )
		{
			$this->activateVehicle->checkStateVehicle($request->get('vehicle_id'));
			
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
		$destroy = new ImageFactory($request->get('key'), 'vehicle/', null, $request->get('type'), null, $request->get('path'));
		
		if ( $destroy )
		{
			$this->activateVehicle->checkStateVehicle($request->get('id'));
			
			return response()->json([
				'success' => true
			]);
		}
		
		return response()->json([
			'success' => false
		]);
	}
	
}
