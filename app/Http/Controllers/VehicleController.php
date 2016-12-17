<?php

namespace Controlqtime\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Log\Writer as Log;
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
	 * @var Log
	 */
	protected $log;
	
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
	 * @param Log                      $log
	 * @param ModelVehicle             $modelVehicle
	 * @param StateVehicle             $stateVehicle
	 * @param Trademark                $trademark
	 * @param TypeVehicle              $typeVehicle
	 * @param Vehicle                  $vehicle
	 */
	public function __construct(ActivateVehicle $activateVehicle, Company $company,
		DateDocumentationVehicle $dateDocumentationVehicle, DetailBus $detailBus,
		DetailVehicle $detailVehicle, Fuel $fuel, Log $log, ModelVehicle $modelVehicle,
		StateVehicle $stateVehicle, Trademark $trademark, TypeVehicle $typeVehicle,
		Vehicle $vehicle)
	{
		$this->activateVehicle          = $activateVehicle;
		$this->company                  = $company;
		$this->dateDocumentationVehicle = $dateDocumentationVehicle;
		$this->detailBus                = $detailBus;
		$this->detailVehicle            = $detailVehicle;
		$this->fuel                     = $fuel;
		$this->log                      = $log;
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
		$vehicles = $this->vehicle->with(['typeVehicle', 'modelVehicle'])->get();
		
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
		$companies     = $this->company->enabled()->pluck('firm_name', 'id');
		$fuels         = $this->fuel->pluck('name', 'id');
		$modelVehicles = $this->modelVehicle->pluck('name', 'id');
		$stateVehicles = $this->stateVehicle->pluck('name', 'id');
		$trademarks    = $this->trademark->pluck('name', 'id');
		$typeVehicles  = $this->typeVehicle->pluck('name', 'id');
		
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
			
			if ( $request->get('type_vehicle_id') == 2 )
			{
				$detailVehicle->detailBus()->create($request->all());
			}
			$vehicle->dateDocumentationVehicle()->create($request->all());
			session()->flash('success', 'El registro fue almacenado satisfactoriamente.');
			DB::commit();
			
			return response()->json(['status' => true, 'url' => '/operations/vehicles']);
		} catch ( Exception $e )
		{
			$this->log->error("Error Store Vehicle: " . $e->getMessage());
			DB::rollback();
			
			return response()->json(['status' => false]);
		}
	}
	
	/**
	 * @param $id
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function edit($id)
	{
		$vehicle = $this->vehicle->with(['modelVehicle.trademark'])->findOrFail($id);
		
		$trademarks    = $this->trademark->pluck('name', 'id');
		$modelVehicles = $this->trademark->findOrFail($vehicle->modelVehicle->trademark->id)->modelVehicles->pluck('name', 'id');
		$typeVehicles  = $this->typeVehicle->where('id', $vehicle->typeVehicle->id)->pluck('name', 'id');
		$companies     = $this->company->enabled()->pluck('firm_name', 'id');
		$fuels         = $this->fuel->pluck('name', 'id');
		$stateVehicles = $this->stateVehicle->pluck('name', 'id');
		
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
		$request->request->add(['user_id' => auth()->user()->id]);
		DB::beginTransaction();
		
		try
		{
			$vehicle = $this->vehicle->findOrFail($id);
			$vehicle->update($request->all());
			$vehicle->detailVehicle->update($request->all());
			
			if ( $request->get('type_vehicle_id') == 2 )
			{
				$vehicle->detailVehicle->detailBus->update($request->all());
			}
			$vehicle->dateDocumentationVehicle->update($request->all());
			session()->flash('success', 'El registro fue actualizado satisfactoriamente.');
			DB::commit();
			
			return response()->json(['status' => true, 'url' => '/operations/vehicles']);
		} catch ( Exception $e )
		{
			$this->log->error("Error Update Vehicle: " . $e->getMessage());
			DB::rollback();
			
			return response()->json(['status' => false]);
		}
	}
	
	/**
	 * @param $id
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function show($id)
	{
		$vehicle = $this->vehicle->with([
			'modelVehicle', 'typeVehicle', 'detailVehicle.detailBus', 'company', 'user.employee'
		])->findOrFail($id);
		
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
		$vehicle = $this->vehicle->findOrFail($id);
		
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
				'status' => true
			]);
		}
		
		return response()->json([
			'status' => false
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
				'status' => true
			]);
		}
		
		return response()->json([
			'status' => false
		]);
	}
	
}
