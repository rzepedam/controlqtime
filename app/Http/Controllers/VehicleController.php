<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Core\Contracts\FuelRepoInterface;
use Controlqtime\Core\Contracts\ImageCirculationPermitVehicleRepoInterface;
use Controlqtime\Core\Contracts\ImageObligatoryInsuranceVehicleRepoInterface;
use Controlqtime\Core\Contracts\ImagePadronVehicleRepoInterface;
use Controlqtime\Core\Contracts\ImagePatentVehicleRepoInterface;
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
	protected $image_cir_permit;
	protected $image_obl_ins;
	protected $image_padron;
	protected $image_patent;
	protected $model_vehicle;
	protected $trademark;
	protected $type_vehicle;
	protected $state_vehicle;
	protected $vehicle;

	public function __construct(VehicleRepoInterface $vehicle, TypeVehicleRepoInterface $type_vehicle, TrademarkRepoInterface $trademark, ModelVehicleRepoInterface $model_vehicle, CompanyRepoInterface $company, FuelRepoInterface $fuel, ImagePadronVehicleRepoInterface $image_padron, ImageObligatoryInsuranceVehicleRepoInterface $image_obl_ins, ImagePatentVehicleRepoInterface $image_patent, ImageCirculationPermitVehicleRepoInterface $image_cir_permit, StateVehicleRepoInterface $state_vehicle)
	{
		$this->company          = $company;
		$this->fuel             = $fuel;
		$this->image_cir_permit = $image_cir_permit;
		$this->image_obl_ins    = $image_obl_ins;
		$this->image_padron     = $image_padron;
		$this->image_patent     = $image_patent;
		$this->model_vehicle    = $model_vehicle;
		$this->trademark        = $trademark;
		$this->type_vehicle     = $type_vehicle;
		$this->state_vehicle 	= $state_vehicle;
		$this->vehicle          = $vehicle;
	}

	public function index()
	{
		return view('operations.vehicles.index', compact('vehicles'));
	}

	public function getVehicles() {
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
		$state_vehicles	= $this->state_vehicle->lists('name', 'id');

		return view('operations.vehicles.create', compact(
			'trademarks', 'model_vehicles', 'type_vehicles', 'fuels', 'companies',
			'state_vehicles'
		));
	}

	public function store(VehicleRequest $request)
	{
		$this->vehicle->create($request->all());

		return redirect()->route('operations.vehicles.index');
	}

	public function edit($id)
	{
		$vehicle        = $this->vehicle->find($id, ['modelVehicle.trademark']);
		$trademarks     = $this->trademark->lists('name', 'id');
		$model_vehicles = $this->trademark->findModelVehicles($vehicle->modelVehicle->trademark->id);
		$type_vehicles  = $this->type_vehicle->lists('name', 'id');
		$companies      = $this->company->whereLists('state', 'enable', 'firm_name');
		$fuels          = $this->fuel->lists('name', 'id');
		$state_vehicles	= $this->state_vehicle->lists('name', 'id');

		return view('operations.vehicles.edit', compact(
			'vehicle', 'type_vehicles', 'trademarks', 'model_vehicles', 'companies', 'fuels',
			'state_vehicles'
		));
	}

	public function update(VehicleRequest $request, $id)
	{
		$this->vehicle->update($request->all(), $id);

		return redirect()->route('operations.vehicles.index');
	}

	public function show($id)
	{
		$vehicle = $this->vehicle->find($id);

		return view('operations.vehicles.show', compact('vehicle'));
	}

	public function destroy($id)
	{
		$this->vehicle->delete($id);

		return redirect()->route('operations.vehicles.index');
	}

	public function getImages($id)
	{
		$vehicle = $this->vehicle->find($id);

		return view('operations.vehicles.upload', compact('id', 'vehicle'));
	}

	public function addImages(Request $request)
	{
		switch ($request->get('type'))
		{
			case 'padron':
				$save = $this->image_padron->addImages('vehicle', $request->file('file_data'), $request->get('id'), $request->get('type'));
				break;

			case 'obligatory_insurance':
				$save = $this->image_obl_ins->addImages('vehicle', $request->file('file_data'), $request->get('id'), $request->get('type'));
				break;

			case 'patent':
				$save = $this->image_patent->addImages('vehicle', $request->file('file_data'), $request->get('id'), $request->get('type'));
				break;

			case 'circulation_permit':
				$save = $this->image_cir_permit->addImages('vehicle', $request->file('file_data'), $request->get('id'), $request->get('type'));
				break;
		}

		if ( $save )
		{
			$this->vehicle->checkState($request->get('id'));

			return response()->json(['success' => true]);
		}

		return response()->json(['success' => false]);
	}

	public function deleteFiles(Request $request)
	{
		switch ($request->get('type'))
		{
			case 'padron':
				$destroy = $this->image_padron->destroyImage($request->get('path'));
				$this->image_padron->delete($request->get('key'));
				break;

			case 'obligatory_insurance':
				$destroy = $this->image_obl_ins->destroyImage($request->get('path'));
				$this->image_obl_ins->delete($request->get('key'));
				break;

			case 'patent':
				$destroy = $this->image_patent->destroyImage($request->get('path'));
				$this->image_patent->delete($request->get('key'));
				break;

			case 'circulation_permit':
				$destroy = $this->image_cir_permit->destroyImage($request->get('path'));
				$this->image_cir_permit->delete($request->get('key'));
				break;
		}

		if ( $destroy )
		{
			$this->vehicle->checkState($request->get('id'));

			return response()->json(['success' => true]);
		}

		return response()->json(['success' => false]);
	}

}
