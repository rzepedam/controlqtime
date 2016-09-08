<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Core\Contracts\FuelRepoInterface;
use Controlqtime\Core\Contracts\ImageFactoryInterface;
use Controlqtime\Core\Contracts\StateVehicleRepoInterface;
use Controlqtime\Http\Requests;
use Controlqtime\Core\Contracts\CompanyRepoInterface;
use Controlqtime\Core\Contracts\ModelVehicleRepoInterface;
use Controlqtime\Core\Contracts\TrademarkRepoInterface;
use Controlqtime\Core\Contracts\TypeVehicleRepoInterface;
use Controlqtime\Core\Contracts\VehicleRepoInterface;
use Controlqtime\Http\Requests\VehicleRequest;
use Illuminate\Http\Request;

class VehicleController extends Controller {

	protected $company;
	protected $fuel;
	protected $image;
	protected $model_vehicle;
	protected $trademark;
	protected $type_vehicle;
	protected $state_vehicle;
	protected $vehicle;

	public function __construct(VehicleRepoInterface $vehicle, TypeVehicleRepoInterface $type_vehicle, TrademarkRepoInterface $trademark, ModelVehicleRepoInterface $model_vehicle, CompanyRepoInterface $company, FuelRepoInterface $fuel, StateVehicleRepoInterface $state_vehicle, ImageFactoryInterface $image)
	{
		$this->company       = $company;
		$this->fuel          = $fuel;
		$this->image         = $image;
		$this->model_vehicle = $model_vehicle;
		$this->trademark     = $trademark;
		$this->type_vehicle  = $type_vehicle;
		$this->state_vehicle = $state_vehicle;
		$this->vehicle       = $vehicle;
	}

	public function index()
	{
		return view('operations.vehicles.index', compact('vehicles'));
	}

	public function getVehicles()
	{
		$vehicles = $this->vehicle->all(['typeVehicle', 'modelVehicle']);

		return $vehicles;
	}

	public function create()
	{
		$fuels          = $this->fuel->lists('name', 'id');
		$model_vehicles = $this->model_vehicle->lists('name', 'id');
		$trademarks     = $this->trademark->lists('name', 'id');
		$type_vehicles  = $this->type_vehicle->lists('name', 'id');
		$companies      = $this->company->whereLists('state', 'enable', 'firm_name');
		$state_vehicles = $this->state_vehicle->lists('name', 'id');

		return view('operations.vehicles.create', compact(
			'trademarks', 'model_vehicles', 'type_vehicles', 'fuels', 'companies',
			'state_vehicles'
		));
	}

	public function store(VehicleRequest $request)
	{
		$this->vehicle->create($request->all());

		return response()->json(array(
			'success' => true,
			'url'     => '/operations/vehicles'
		));
	}

	public function edit($id)
	{
		$vehicle        = $this->vehicle->find($id, ['modelVehicle.trademark']);
		$trademarks     = $this->trademark->lists('name', 'id');
		$model_vehicles = $this->trademark->findModelVehicles($vehicle->modelVehicle->trademark->id);
		$type_vehicles  = $this->type_vehicle->lists('name', 'id');
		$companies      = $this->company->whereLists('state', 'enable', 'firm_name');
		$fuels          = $this->fuel->lists('name', 'id');
		$state_vehicles = $this->state_vehicle->lists('name', 'id');

		return view('operations.vehicles.edit', compact(
			'vehicle', 'type_vehicles', 'trademarks', 'model_vehicles', 'companies', 'fuels',
			'state_vehicles'
		));
	}

	public function update(VehicleRequest $request, $id)
	{
		$this->vehicle->update($request->all(), $id);

		return response()->json(array(
			'success' => true,
			'url'     => '/operations/vehicles'
		));
	}

	public function show($id)
	{
		$vehicle = $this->vehicle->find($id);

		return view('operations.vehicles.show', compact('vehicle'));
	}

	public function destroy($id)
	{
		$this->vehicle->delete($id);

		return redirect()->route('vehicles.index');
	}

	public function getImages($id)
	{
		$vehicle = $this->vehicle->find($id);

		return view('operations.vehicles.upload', compact('id', 'vehicle'));
	}

	public function addImages(Request $request)
	{
		$save = $this->image->build($request->get('type'), $request->get('vehicle_id'), null, $request->file('file_data'), null)->addImages();

		if ( $save )
		{
			$this->vehicle->checkState($request->get('vehicle_id'));

			return response()->json(['success' => true]);
		}

		return response()->json(['success' => false]);
	}

	public function deleteFiles(Request $request)
	{
		$destroy = $this->image->build($request->get('type'), $request->get('key'), null, null, $request->get('path'))->destroyImage();

		if ( $destroy )
		{
			$this->vehicle->checkState($request->get('id'));

			return response()->json(['success' => true]);
		}

		return response()->json(['success' => false]);
	}

}
