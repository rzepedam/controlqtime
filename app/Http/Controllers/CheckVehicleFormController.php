<?php

namespace Controlqtime\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Controlqtime\Core\Contracts\VehicleRepoInterface;
use Controlqtime\Http\Requests\CheckVehicleFormRequest;
use Controlqtime\Core\Contracts\CheckVehicleFormRepoInterface;
use Controlqtime\Core\Contracts\StatePieceVehicleRepoInterface;
use Controlqtime\Core\Contracts\MasterFormPieceVehicleRepoInterface;

class CheckVehicleFormController extends Controller
{
	/**
	 * @var CheckVehicleFormRepoInterface
	 */
	protected $check_vehicle_form;
	
	/**
	 * @var MasterFormPieceVehicleRepoInterface
	 */
	protected $master_form_piece_vehicle;
	
	/**
	 * @var StatePieceVehicleRepoInterface
	 */
	protected $state_piece_vehicle;
	
	/**
	 * @var VehicleRepoInterface
	 */
	protected $vehicle;
	
	/**
	 * CheckVehicleFormController constructor.
	 *
	 * @param CheckVehicleFormRepoInterface $check_vehicle_form
	 * @param MasterFormPieceVehicleRepoInterface $master_form_piece_vehicle
	 * @param StatePieceVehicleRepoInterface $state_piece_vehicle
	 * @param VehicleRepoInterface $vehicle
	 */
	public function __construct(CheckVehicleFormRepoInterface $check_vehicle_form, MasterFormPieceVehicleRepoInterface $master_form_piece_vehicle, StatePieceVehicleRepoInterface $state_piece_vehicle, VehicleRepoInterface $vehicle)
	{
		$this->check_vehicle_form        = $check_vehicle_form;
		$this->master_form_piece_vehicle = $master_form_piece_vehicle;
		$this->state_piece_vehicle       = $state_piece_vehicle;
		$this->vehicle                   = $vehicle;
	}
	
	/**
	 * @return mixed for Bootstrap-Table
	 */
	public function getCheckVehicleForms()
	{
		$checkVehicleForms = $this->check_vehicle_form->all(['vehicle', 'employee']);
		
		return $checkVehicleForms;
	}
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		return view('operations.check-vehicle-forms.index');
	}
	
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$masterFormPieceVehicle = $this->master_form_piece_vehicle->find(1)->pieceVehicles;
		$statePieceVehicles     = $this->state_piece_vehicle->all();
		$vehicles               = $this->vehicle->whereLists('state', 'enable', 'patent');
		
		return view('operations.check-vehicle-forms.create', compact(
			'masterFormPieceVehicle', 'statePieceVehicles', 'vehicles'
		));
	}
	
	/**
	 * @param CheckVehicleFormRequest $request
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function store(CheckVehicleFormRequest $request)
	{
		$request->request->add(['employee_id' => auth()->user()->employee->id]);
		$request->request->add(['master_form_piece_vehicle_id' => 1]);
		DB::beginTransaction();
		
		try
		{
			$checkVehicleForm = $this->check_vehicle_form->create($request->all());
			$checkVehicleForm->statePieceVehicles()->attach($request->get('state_piece_vehicle_id'));
			
			DB::commit();
		} catch (Exception $e)
		{
			DB::rollback();
		}
		
		return response()->json([
			'success' => true,
			'url'     => '/operations/check-vehicle-forms'
		]);
	}
	
	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$checkVehicleForm = $this->check_vehicle_form->find($id, [
			'masterFormPieceVehicle.pieceVehicles', 'vehicle.modelVehicle.trademark', 'employee', 'statePieceVehicles'
		]);
		
		return view('operations.check-vehicle-forms.show', compact(
			'checkVehicleForm', 'masterFormPieceVehicle'
		));
	}
	
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		//
	}
	
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function update(CheckVehicleFormRequest $request, $id)
	{
		//
	}
	
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		//
	}
}
