<?php

namespace Controlqtime\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Controlqtime\Core\Entities\Fuel;
use Controlqtime\Core\Entities\Company;
use Controlqtime\Core\Entities\Trademark;
use Controlqtime\Core\Factory\ImageFactory;
use Controlqtime\Core\Entities\ModelVehicle;
use Controlqtime\Http\Requests\VehicleRequest;
use Controlqtime\Core\Contracts\VehicleRepoInterface;
use Controlqtime\Core\Contracts\ActivateVehicleInterface;
use Controlqtime\Core\Contracts\DetailBusesRepoInterface;
use Controlqtime\Core\Contracts\TypeVehicleRepoInterface;
use Controlqtime\Core\Contracts\StateVehicleRepoInterface;
use Controlqtime\Core\Contracts\DetailVehicleRepoInterface;
use Controlqtime\Core\Contracts\DateDocumentationVehicleRepoInterface;

class VehicleController extends Controller
{
	/**
	 * @var ActivateVehicleInterface
	 */
	protected $activate_vehicle;
	
	/**
	 * @var Company
	 */
	protected $company;
	
	/**
	 * @var DateDocumentationVehicleRepoInterface
	 */
	protected $dateDocumentationVehicle;
	
	/**
	 * @var DetailBusesRepoInterface
	 */
	protected $detailBus;
	
	/**
	 * @var DetailVehicleRepoInterface
	 */
	protected $detailVehicle;
	
	/**
	 * @var Fuel
	 */
	protected $fuel;
	
	/**
	 * @var ModelVehicle
	 */
	protected $model_vehicle;
	
	/**
	 * @var Trademark
	 */
	protected $trademark;
	
	/**
	 * @var TypeVehicleRepoInterface
	 */
	protected $typeVehicle;
	
	/**
	 * @var StateVehicleRepoInterface
	 */
	protected $state_vehicle;
	
	/**
	 * @var VehicleRepoInterface
	 */
	protected $vehicle;
	
	/**
	 * VehicleController constructor.
	 *
	 * @param ActivateVehicleInterface              $activate_vehicle
	 * @param Company                               $company
	 * @param Fuel                                  $fuel
	 * @param ModelVehicle                          $model_vehicle
	 * @param Trademark                             $trademark
	 * @param TypeVehicleRepoInterface              $typeVehicle
	 * @param VehicleRepoInterface                  $vehicle
	 * @param StateVehicleRepoInterface             $state_vehicle
	 * @param DetailVehicleRepoInterface            $detailVehicle
	 * @param DateDocumentationVehicleRepoInterface $dateDocumentationVehicle
	 * @param DetailBusesRepoInterface              $detailBus
	 */
	public function __construct(ActivateVehicleInterface $activate_vehicle, Company $company, Fuel $fuel,
		ModelVehicle $model_vehicle, Trademark $trademark, TypeVehicleRepoInterface $typeVehicle,
		VehicleRepoInterface $vehicle, StateVehicleRepoInterface $state_vehicle,
		DetailVehicleRepoInterface $detailVehicle, DateDocumentationVehicleRepoInterface $dateDocumentationVehicle,
		DetailBusesRepoInterface $detailBus)
	{
		$this->activate_vehicle         = $activate_vehicle;
		$this->company                  = $company;
		$this->dateDocumentationVehicle = $dateDocumentationVehicle;
		$this->detailBus               = $detailBus;
		$this->detailVehicle            = $detailVehicle;
		$this->fuel                     = $fuel;
		$this->model_vehicle            = $model_vehicle;
		$this->trademark                = $trademark;
		$this->typeVehicle             = $typeVehicle;
		$this->state_vehicle            = $state_vehicle;
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
		$companies      = $this->company->whereLists('state', 'enable', 'firm_name');
		$fuels          = $this->fuel->lists('name', 'id');
		$model_vehicles = $this->model_vehicle->lists('name', 'id');
		$state_vehicles = $this->state_vehicle->lists('name', 'id');
		$trademarks     = $this->trademark->lists('name', 'id');
		$typeVehicles  = $this->typeVehicle->lists('name', 'id');
		
		return view('operations.vehicles.create', compact(
			'trademarks', 'model_vehicles', 'typeVehicles', 'fuels', 'companies', 'state_vehicles'
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
			
			if ($request->get('typeVehicle_id') == 2)
			{
				$detailVehicle->detailBus()->create($request->all());
			}
			
			$vehicle->dateDocumentationVehicle()->create($request->all());
			
			DB::commit();
		} catch (Exception $e)
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
		$vehicle        = $this->vehicle->find($id, ['modelVehicle.trademark']);
		$trademarks     = $this->trademark->lists('name', 'id');
		$model_vehicles = $this->trademark->findModelVehicles($vehicle->modelVehicle->trademark->id);
		$typeVehicles  = $this->typeVehicle->whereLists('id', $vehicle->typeVehicle_id, 'name');
		$companies      = $this->company->whereLists('state', 'enable', 'firm_name');
		$fuels          = $this->fuel->lists('name', 'id');
		$state_vehicles = $this->state_vehicle->lists('name', 'id');
		
		return view('operations.vehicles.edit', compact(
			'vehicle', 'typeVehicles', 'trademarks', 'model_vehicles', 'companies', 'fuels', 'state_vehicles'
		));
	}
	
	/**
	 * @param VehicleRequest $request
	 * @param $id
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
			
			if ($request->get('typeVehicle_id') == 2)
			{
				$this->detailBus->update($request->all(), $detailVehicle->detailBus->id);
			}
			
			$this->dateDocumentationVehicle->update($request->all(), $vehicle->dateDocumentationVehicle->id);
			
			DB::commit();
		} catch (Exception $e)
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
		
		if ($save)
		{
			$this->activate_vehicle->checkStateVehicle($request->get('vehicle_id'));
			
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
		
		if ($destroy)
		{
			$this->activate_vehicle->checkStateVehicle($request->get('id'));
			
			return response()->json([
				'success' => true
			]);
		}
		
		return response()->json([
			'success' => false
		]);
	}
	
}
