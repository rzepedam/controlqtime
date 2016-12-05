<?php

namespace Controlqtime\Http\Controllers;

use Exception;
use Controlqtime\Core\Entities\PieceVehicle;
use Controlqtime\Http\Requests\PieceVehicleRequest;

class PieceVehicleController extends Controller
{
	/**
	 * @var PieceVehicle
	 */
	protected $pieceVehicle;
	
	/**
	 * PieceVehicleController constructor.
	 *
	 * @param PieceVehicle $pieceVehicle
	 */
	public function __construct(PieceVehicle $pieceVehicle)
	{
		$this->pieceVehicle = $pieceVehicle;
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
	 * @return mixed for Bootstrap Table
	 */
	public function getPieceVehicles()
	{
		$pieceVehicles = $this->pieceVehicle->all();
		
		return $pieceVehicles;
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
		if ( ! $this->restore($request) )
		{
			$this->pieceVehicle->create($request->all());
		}
		
		return response()->json([
			'success' => true,
			'url'     => '/maintainers/piece-vehicles'
		]);
	}
	
	/**
	 * @param $request
	 *
	 * @return bool
	 */
	public function restore($request)
	{
		try
		{
			$pieceVehicle = $this->pieceVehicle->onlyTrashed()->where('name', $request->get('name'))->firstOrFail();
			
			return $pieceVehicle->restore();
		} catch ( Exception $e )
		{
			return false;
		}
		
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
		$pieceVehicle = $this->pieceVehicle->findOrFail($id);
		
		return view('maintainers.piece-vehicles.edit', compact('pieceVehicle'));
	}
	
	/**
	 * @param PieceVehicleRequest $request
	 * @param                     $id
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function update(PieceVehicleRequest $request, $id)
	{
		try
		{
			$this->pieceVehicle->findOrFail($id)->fill($request->all())->saveOrFail();
			session()->flash('success', 'El registro fue actualizado satisfactoriamente.');
			
			return response()->json([
				'success' => true,
				'url'     => '/maintainers/piece-vehicles'
			]);
		} catch ( Exception $e )
		{
			return response()->json(['success' => false]);
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
		$this->pieceVehicle->destroy($id);
		
		return redirect()->route('piece-vehicles.index');
	}
}
