<?php

namespace Controlqtime\Http\Controllers;

use Exception;
use Illuminate\Log\Writer as Log;
use Controlqtime\Core\Entities\Fuel;
use Controlqtime\Http\Requests\FuelRequest;

class FuelController extends Controller
{
	/**
	 * @var Fuel
	 */
	protected $fuel;
	
	/**
	 * @var Log
	 */
	protected $log;
	
	/**
	 * FuelController constructor.
	 *
	 * @param Fuel $fuel
	 * @param Log  $log
	 */
	public function __construct(Fuel $fuel, Log $log)
	{
		$this->fuel = $fuel;
		$this->log  = $log;
	}
	
	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		return view('maintainers.fuels.index');
	}
	
	/**
	 * @return mixed for Bootstrap-Table
	 */
	public function getFuels()
	{
		$fuels = $this->fuel->all();
		
		return $fuels;
	}
	
	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function create()
	{
		return view('maintainers.fuels.create');
	}
	
	/**
	 * @param FuelRequest $request
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function store(FuelRequest $request)
	{
		try
		{
			if ( ! $this->restore($request) )
			{
				$this->fuel->create($request->all());
			}
			session()->flash('success', 'El registro fue almacenado satisfactoriamente.');
			
			return response()->json(['status' => true, 'url' => '/maintainers/fuels']);
		} catch ( Exception $e )
		{
			$this->log->error("Error Store Fuel: " . $e->getMessage());
			
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
			$fuel = $this->fuel->onlyTrashed()->where('name', $request->get('name'))->firstOrFail();
			
			return $fuel->restore();
		} catch ( Exception $e )
		{
			return false;
		}
		
	}
	
	/**
	 * @param $id
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function edit($id)
	{
		$fuel = $this->fuel->findOrFail($id);
		
		return view('maintainers.fuels.edit', compact('fuel'));
	}
	
	/**
	 * @param FuelRequest $request
	 * @param             $id
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function update(FuelRequest $request, $id)
	{
		try
		{
			$this->fuel->findOrFail($id)->fill($request->all())->saveOrFail();
			session()->flash('success', 'El registro fue actualizado satisfactoriamente.');
			
			return response()->json(['status' => true, 'url' => '/maintainers/fuels']);
		} catch ( Exception $e )
		{
			$this->log->error("Error Update Fuel: " . $e->getMessage());
			
			return response()->json(['status' => false]);
		}
	}
	
	/**
	 * @param $id
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function destroy($id)
	{
		try
		{
			$this->fuel->destroy($id);
			session()->flash('success', 'El registro fue eliminado satisfactoriamente.');
			
			return redirect()->route('fuels.index');
		} catch ( Exception $e )
		{
			$this->log->error("Error Delete Fuel: " . $e->getMessage());
			
			return response()->json(['status' => false]);
		}
	}
}
