<?php

namespace Controlqtime\Http\Controllers;

use Exception;
use Illuminate\Log\Writer as Log;
use Controlqtime\Core\Entities\EngineCubic;
use Controlqtime\Http\Requests\EngineCubicRequest;

class EngineCubicController extends Controller
{
	/**
	 * @var EngineCubic
	 */
	protected $engineCubic;
	
	/**
	 * @var Log
	 */
	protected $log;
	
	/**
	 * EngineCubicController constructor.
	 *
	 * @param EngineCubic $engineCubic
	 * @param Log         $log
	 */
	public function __construct(EngineCubic $engineCubic, Log $log)
	{
		$this->engineCubic = $engineCubic;
		$this->log         = $log;
	}
	
	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		return view('maintainers.measuring-units.engine-cubics.index');
	}
	
	/**
	 * @return mixed for Bootstrap-Table
	 */
	public function getEngineCubics()
	{
		$engineCubics = $this->engineCubic->all();
		
		return $engineCubics;
	}
	
	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function create()
	{
		return view('maintainers.measuring-units.engine-cubics.create');
	}
	
	/**
	 * @param EngineCubicRequest $request
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function store(EngineCubicRequest $request)
	{
		try
		{
			if ( ! $this->restore($request) )
			{
				$this->engineCubic->create($request->all());
			}
			session()->flash('success', 'El registro fue almacenado satisfactoriamente.');
			
			return response()->json(['status' => true, 'url' => '/maintainers/measuring-units/engine-cubics']);
		} catch ( Exception $e )
		{
			$this->log->error("Error Store EngineCubic: " . $e->getMessage());
			
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
			$engineCubic = $this->engineCubic->onlyTrashed()->where('name', $request->get('name'))->where('acr', $request->get('acr'))->firstOrFail();
			
			return $engineCubic->restore();
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
		$engineCubic = $this->engineCubic->findOrFail($id);
		
		return view('maintainers.measuring-units.engine-cubics.edit', compact('engineCubic'));
	}
	
	/**
	 * @param EngineCubicRequest $request
	 * @param                    $id
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function update(EngineCubicRequest $request, $id)
	{
		try
		{
			$this->engineCubic->findOrFail($id)->fill($request->all())->saveOrFail();
			session()->flash('success', 'El registro fue actualizado satisfactoriamente.');
			
			return response()->json(['status' => true, 'url' => '/maintainers/measuring-units/engine-cubics']);
		} catch ( Exception $e )
		{
			$this->log->error("Error Update EngineCubic: " . $e->getMessage());
			
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
			$this->engineCubic->destroy($id);
			session()->flash('success', 'El registro fue eliminado satisfactoriamente.');
			
			return redirect()->route('engine-cubics.index');
		} catch ( Exception $e )
		{
			$this->log->error("Error Delete EngineCubic: " . $e->getMessage());
			
			return response()->json(['status' => false]);
		}
	}
}
