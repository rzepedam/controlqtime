<?php

namespace Controlqtime\Http\Controllers;

use Exception;
use Controlqtime\Core\Entities\StatePieceVehicle;
use Controlqtime\Http\Requests\StatePieceVehicleRequest;

class StatePieceVehicleController extends Controller
{
	/**
	 * @var StatePieceVehicle
	 */
	protected $statePieceVehicle;
	
	/**
	 * StatePieceVehicleController constructor.
	 *
	 * @param StatePieceVehicle $statePieceVehicle
	 */
	public function __construct(StatePieceVehicle $statePieceVehicle)
	{
		$this->statePieceVehicle = $statePieceVehicle;
	}
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		return view('maintainers.state-piece-vehicles.index');
	}
	
	/**
	 * @return mixed for Bootstrap Table
	 */
	public function getStatePieceVehicles()
	{
		$statePieceVehicles = $this->statePieceVehicle->all();
		
		return $statePieceVehicles;
	}
	
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('maintainers.state-piece-vehicles.create');
	}
	
	/**
	 * @param StatePieceVehicleRequest $request
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function store(StatePieceVehicleRequest $request)
	{
		if ( ! $this->restore($request) )
		{
			$this->statePieceVehicle->create($request->all());
		}
		
		return response()->json([
			'success' => true,
			'url'     => '/maintainers/state-piece-vehicles'
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
			$statePieceVehicle = $this->statePieceVehicle->onlyTrashed()->where('name', $request->get('name'))->firstOrFail();
			
			return $statePieceVehicle->restore();
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
		$statePieceVehicle = $this->statePieceVehicle->findOrFail($id);
		
		return view('maintainers.state-piece-vehicles.edit', compact('statePieceVehicle'));
	}
	
	/**
	 * @param StatePieceVehicleRequest $request
	 * @param                          $id
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function update(StatePieceVehicleRequest $request, $id)
	{
		try
		{
			$this->statePieceVehicle->findOrFail($id)->fill($request->all())->saveOrFail();
			session()->flash('success', 'El registro fue actualizado satisfactoriamente.');
			
			return response()->json([
				'success' => true,
				'url'     => '/maintainers/state-piece-vehicles'
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
		$this->statePieceVehicle->destroy($id);
		
		return redirect()->route('state-piece-vehicles.index');
	}
}
