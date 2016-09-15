<?php

namespace Controlqtime\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Controlqtime\Core\Contracts\PieceVehicleRepoInterface;
use Controlqtime\Http\Requests\MasterFormPieceVehicleRequest;
use Controlqtime\Core\Contracts\MasterFormPieceVehicleRepoInterface;

class MasterFormPieceVehicleController extends Controller
{
	/**
	 * @var \Controlqtime\Core\Contracts\MasterFormPieceVehicleRepoInterface
	 */
	protected $master_form_piece_vehicle;
	
	/**
	 * @var \Controlqtime\Core\Contracts\PieceVehicleRepoInterface
	 */
	private $piece_vehicle;
	
	/**
	 * MasterFormPieceVehicleController constructor.
	 *
	 * @param \Controlqtime\Core\Contracts\MasterFormPieceVehicleRepoInterface $master_form_piece_vehicle
	 * @param \Controlqtime\Core\Contracts\PieceVehicleRepoInterface $piece_vehicle
	 */
	public function __construct(MasterFormPieceVehicleRepoInterface $master_form_piece_vehicle, PieceVehicleRepoInterface $piece_vehicle)
	{
		$this->master_form_piece_vehicle = $master_form_piece_vehicle;
		$this->piece_vehicle             = $piece_vehicle;
	}
	
	/**
	 * @return mixed for Bootstrap Table
	 */
	public function getMasterFormPieceVehicles()
	{
		$masterFormPieceVehicles = $this->master_form_piece_vehicle->all();
		
		return $masterFormPieceVehicles;
	}
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		return view('operations.master-form-piece-vehicles.index');
	}
	
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$pieceVehicles = $this->piece_vehicle->all();
		
		return view('operations.master-form-piece-vehicles.create', compact('pieceVehicles'));
	}
	
	/**
	 * @param \Controlqtime\Http\Requests\MasterFormPieceVehicleRequest $request
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function store(MasterFormPieceVehicleRequest $request)
	{
		DB::beginTransaction();
		
		try {
			$masterFormPieceVehicle = $this->master_form_piece_vehicle->create($request->all());
			$masterFormPieceVehicle->pieceVehicles()->attach($request->get('piece_id'));
			
		    DB::commit();
		}catch( Exception $e) {
		    DB::rollback();
		}
		
		return response()->json(array(
			'success' => true,
			'url'     => '/operations/master-form-piece-vehicles'
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
		$masterFormPieceVehicle = $this->master_form_piece_vehicle->find($id, ['pieceVehicles']);
		$pieceVehicles          = $this->piece_vehicle->all();
		
		return view('operations.master-form-piece-vehicles.edit', compact(
			'masterFormPieceVehicle', 'pieceVehicles'
		));
	}
	
	/**
	 * @param \Controlqtime\Http\Requests\MasterFormPieceVehicleRequest $request
	 * @param $id
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function update(MasterFormPieceVehicleRequest $request, $id)
	{
		DB::beginTransaction();
		
		try {
			$masterFormPieceVehicle = $this->master_form_piece_vehicle->update($request->all(), $id);
			$masterFormPieceVehicle->pieceVehicles()->sync($request->get('piece_id'));
			
		    DB::commit();
		}catch( Exception $e) {
		    DB::rollback();
		}
		
		return response()->json(array(
			'success' => true,
			'url'     => '/operations/master-form-piece-vehicles'
		));
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
