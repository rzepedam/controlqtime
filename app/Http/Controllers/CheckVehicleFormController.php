<?php

namespace Controlqtime\Http\Controllers;

use Exception;
use Illuminate\Log\Writer as Log;
use Illuminate\Support\Facades\DB;
use Controlqtime\Core\Entities\Vehicle;
use Controlqtime\Core\Entities\CheckVehicleForm;
use Controlqtime\Core\Entities\StatePieceVehicle;
use Controlqtime\Core\Entities\MasterFormPieceVehicle;
use Controlqtime\Http\Requests\CheckVehicleFormRequest;

class CheckVehicleFormController extends Controller
{
	/**
	 * @var CheckVehicleForm
	 */
	protected $checkVehicleForm;
	
	/**
	 * @var Log
	 */
	protected $log;
	
	/**
	 * @var MasterFormPieceVehicle
	 */
	protected $masterFormPieceVehicle;
	
	/**
	 * @var StatePieceVehicle
	 */
	protected $statePieceVehicle;
	
	/**
	 * @var Vehicle
	 */
	protected $vehicle;
	
	/**
	 * CheckVehicleFormController constructor.
	 *
	 * @param CheckVehicleForm       $checkVehicleForm
	 * @param Log                    $log
	 * @param MasterFormPieceVehicle $masterFormPieceVehicle
	 * @param StatePieceVehicle      $statePieceVehicle
	 * @param Vehicle                $vehicle
	 */
	public function __construct(CheckVehicleForm $checkVehicleForm, Log $log,
		MasterFormPieceVehicle $masterFormPieceVehicle, StatePieceVehicle $statePieceVehicle, Vehicle $vehicle)
	{
		$this->checkVehicleForm       = $checkVehicleForm;
		$this->log                    = $log;
		$this->masterFormPieceVehicle = $masterFormPieceVehicle;
		$this->statePieceVehicle      = $statePieceVehicle;
		$this->vehicle                = $vehicle;
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
	 * @return mixed for Bootstrap-Table
	 */
	public function getCheckVehicleForms()
	{
		$checkVehicleForms = $this->checkVehicleForm->with(['vehicle', 'user.employee'])->get();
		
		return $checkVehicleForms;
	}
	
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$masterFormPieceVehicle = $this->masterFormPieceVehicle->findOrFail(1)->pieceVehicles;
		$statePieceVehicles     = $this->statePieceVehicle->all();
		$vehicles               = $this->vehicle->enabled()->pluck('patent', 'id');
		
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
		$request->request->add(['user_id' => auth()->user()->id]);
		$request->request->add(['masterFormPieceVehicle_id' => 1]);
		DB::beginTransaction();
		
		try
		{
			$checkVehicleForm = $this->checkVehicleForm->create($request->all());
			$checkVehicleForm->statePieceVehicles()->attach($request->get('statePieceVehicle_id'));
			session()->flash('success', 'El registro fue almacenado satisfactoriamente.');
			DB::commit();
			
			return response()->json(['status' => true, 'url' => '/operations/check-vehicle-forms']);
		} catch ( Exception $e )
		{
			$this->log->error("Error Store CheckVehicleForm: " . $e->getMessage());
			DB::rollback();
			
			return response()->json(['status' => false]);
		}
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
		$checkVehicleForm = $this->checkVehicleForm->with([
			'masterFormPieceVehicle.pieceVehicles', 'vehicle.modelVehicle.trademark',
			'user.employee', 'statePieceVehicles'
		])->findOrFail($id);
		
		return view('operations.check-vehicle-forms.show', compact('checkVehicleForm'));
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
		$masterFormPieceVehicle = $this->masterFormPieceVehicle->findOrFail(1)->pieceVehicles;
		$checkVehicleForm       = $this->checkVehicleForm->findOrFail($id);
		$statePieceVehicles     = $this->statePieceVehicle->all();
		$vehicles               = $this->vehicle->enabled()->pluck('patent', 'id');
		
		return view('operations.check-vehicle-forms.edit', compact(
			'masterFormPieceVehicle', 'checkVehicleForm', 'statePieceVehicles', 'vehicles'
		));
	}
	
	/**
	 * @param CheckVehicleFormRequest $request
	 * @param                         $id
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function update(CheckVehicleFormRequest $request, $id)
	{
		$request->request->add(['user_id' => auth()->user()->id]);
		DB::beginTransaction();
		
		try
		{
			$checkVehicleForm = $this->checkVehicleForm->findOrFail($id)->fill($request->all())->saveOrFail();
			$checkVehicleForm->statePieceVehicles()->sync(
				$request->get('statePieceVehicle_id'), [
					'piece_vehicle_id' => $request->get('piece_vehicle_id')
				]
			);
			session()->flash('success', 'El registro fue actualizado satisfactoriamente.');
			DB::commit();
			
			return response()->json(['status' => true, 'url' => '/operations/check-vehicle-forms']);
		} catch ( Exception $e )
		{
			$this->log->error("Error Update CheckVehicleForm: " . $e->getMessage());
			DB::rollback();
			
			return response()->json(['status' => false]);
		}
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
