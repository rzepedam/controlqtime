<?php

namespace Controlqtime\Http\Controllers;

use Exception;
use Illuminate\Support\Facades\DB;
use Controlqtime\Core\Entities\PieceVehicle;
use Controlqtime\Core\Entities\MasterFormPieceVehicle;
use Controlqtime\Http\Requests\MasterFormPieceVehicleRequest;

class MasterFormPieceVehicleController extends Controller
{
	/**
	 * @var MasterFormPieceVehicle
	 */
	protected $masterFormPieceVehicle;
	
	/**
	 * @var PieceVehicle
	 */
	protected $pieceVehicle;
	
	/**
	 * MasterFormPieceVehicleController constructor.
	 *
	 * @param MasterFormPieceVehicle $masterFormPieceVehicle
	 * @param PieceVehicle           $pieceVehicle
	 */
	public function __construct(MasterFormPieceVehicle $masterFormPieceVehicle, PieceVehicle $pieceVehicle)
	{
		$this->masterFormPieceVehicle = $masterFormPieceVehicle;
		$this->pieceVehicle           = $pieceVehicle;
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
	 * @return mixed for Bootstrap Table
	 */
	public function getMasterFormPieceVehicles()
	{
		$masterFormPieceVehicles = $this->masterFormPieceVehicle->all();
		
		return $masterFormPieceVehicles;
	}
	
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$pieceVehicles = $this->pieceVehicle->all();
		
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
		
		try
		{
			$masterFormPieceVehicle = $this->masterFormPieceVehicle->create($request->all());
			$masterFormPieceVehicle->pieceVehicles()->attach($request->get('piece_id'));
			
			DB::commit();
		} catch ( Exception $e )
		{
			DB::rollback();
		}
		
		return response()->json([
			'success' => true,
			'url'     => '/operations/master-form-piece-vehicles'
		]);
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
		$masterFormPieceVehicle = $this->masterFormPieceVehicle->with(['pieceVehicles'])->findOrFail($id);
		$pieceVehicles          = $this->pieceVehicle->all();
		
		return view('operations.master-form-piece-vehicles.edit', compact(
			'masterFormPieceVehicle', 'pieceVehicles'
		));
	}
	
	/**
	 * @param \Controlqtime\Http\Requests\MasterFormPieceVehicleRequest $request
	 * @param                                                           $id
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function update(MasterFormPieceVehicleRequest $request, $id)
	{
		DB::beginTransaction();
		
		try
		{
			$masterFormPieceVehicle = $this->masterFormPieceVehicle->findOrFail($id)->fill($request->all())->saveOrFail();
			$masterFormPieceVehicle->pieceVehicles()->sync($request->get('piece_id'));
			
			DB::commit();
		} catch ( Exception $e )
		{
			DB::rollback();
		}
		
		return response()->json([
			'success' => true,
			'url'     => '/operations/master-form-piece-vehicles'
		]);
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
		$this->masterFormPieceVehicle->destroy($id);
		
		return redirect()->route('master-form-piece-vehicles.index');
	}
}
