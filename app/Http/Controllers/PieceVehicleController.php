<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Http\Requests\PieceVehicleRequest;
use Controlqtime\Core\Contracts\PieceVehicleRepoInterface;

class PieceVehicleController extends Controller
{
	/**
	 * @var \Controlqtime\Core\Contracts\PieceVehicleRepoInterface
	 */
	protected $piece_vehicle;
	
	/**
	 * PieceVehicleController constructor.
	 *
	 * @param \Controlqtime\Core\Contracts\PieceVehicleRepoInterface $piece_vehicle
	 */
	public function __construct(PieceVehicleRepoInterface $piece_vehicle)
	{
		$this->piece_vehicle = $piece_vehicle;
	}
	
	/**
	 * @return mixed for Bootstrap Table
	 */
	public function getPieceVehicles()
	{
		$pieceVehicles = $this->piece_vehicle->all();
		
		return $pieceVehicles;
	}
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		return view('maintainers.piece-vehicles.index');
	}
	
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('maintainers.piece-vehicles.create');
	}
	
	/**
	 * @param \Controlqtime\Http\Requests\PieceVehicleRequest $request
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function store(PieceVehicleRequest $request)
	{
		$pieceVehicle = $this->piece_vehicle->onlyTrashed('name', $request->get('name'));
		
		if (! $pieceVehicle)
		{
			$this->piece_vehicle->create($request->all());
		}
		
		return response()->json([
			'success' => true,
			'url'     => '/maintainers/piece-vehicles'
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
		//
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
		$pieceVehicle = $this->piece_vehicle->find($id);
		
		return view('maintainers.piece-vehicles.edit', compact('pieceVehicle'));
	}
	
	/**
	 * @param PieceVehicleRequest $request
	 * @param $id
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function update(PieceVehicleRequest $request, $id)
	{
		$this->piece_vehicle->update($request->all(), $id);
		
		return response()->json([
			'success' => true,
			'url'     => '/maintainers/piece-vehicles'
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
		$this->piece_vehicle->delete($id);
		
		return redirect()->route('piece-vehicles.index');
	}
}
