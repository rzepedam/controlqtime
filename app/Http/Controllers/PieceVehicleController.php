<?php

namespace Controlqtime\Http\Controllers;

use Exception;
use Illuminate\Log\Writer as Log;
use Controlqtime\Core\Entities\PieceVehicle;
use Controlqtime\Http\Requests\PieceVehicleRequest;

class PieceVehicleController extends Controller
{
	/**
	 * @var Log
	 */
	protected $log;
	
	/**
	 * @var PieceVehicle
	 */
	protected $pieceVehicle;
	
	/**
	 * PieceVehicleController constructor.
	 *
	 * @param Log          $log
	 * @param PieceVehicle $pieceVehicle
	 */
	public function __construct(Log $log, PieceVehicle $pieceVehicle)
	{
		$this->log          = $log;
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
		try
		{
			if ( ! $this->restore($request) )
			{
				$this->pieceVehicle->create($request->all());
			}
			session()->flash('success', 'El registro fue almacenado satisfactoriamente.');
			
			return response()->json(['status' => true, 'url' => '/maintainers/piece-vehicles']);
		} catch ( Exception $e )
		{
			$this->log->error("Error Store PieceVehicle: " . $e->getMessage());
			
			return response()->json(['status' => false]);
		}
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
			
			return response()->json(['status' => true, 'url' => '/maintainers/piece-vehicles']);
		} catch ( Exception $e )
		{
			$this->log->error("Error Update PieceVehicle: " . $e->getMessage());
			
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
		$this->pieceVehicle->destroy($id);
		
		return redirect()->route('piece-vehicles.index');
	}
}
