<?php

namespace Controlqtime\Http\Controllers;

use Exception;
use Illuminate\Log\Writer as Log;
use Controlqtime\Core\Entities\Trademark;
use Controlqtime\Core\Entities\ModelVehicle;
use Controlqtime\Http\Requests\ModelVehicleRequest;

class ModelVehicleController extends Controller
{
	/**
	 * @var Log
	 */
	protected $log;
	
	/**
	 * @var ModelVehicle
	 */
	protected $modelVehicle;
	
	/**
	 * @var Trademark
	 */
	protected $trademark;
	
	/**
	 * ModelVehicleController constructor.
	 *
	 * @param Log          $log
	 * @param ModelVehicle $modelVehicle
	 * @param Trademark    $trademark
	 */
	public function __construct(Log $log, ModelVehicle $modelVehicle, Trademark $trademark)
	{
		$this->log          = $log;
		$this->modelVehicle = $modelVehicle;
		$this->trademark    = $trademark;
	}
	
	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		return view('maintainers.model-vehicles.index');
	}
	
	/**
	 * @return mixed for Bootstrap-Table
	 */
	public function getModelVehicles()
	{
		$modelVehicles = $this->modelVehicle->with(['trademark'])->get();
		
		return $modelVehicles;
	}
	
	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function create()
	{
		$trademarks = $this->trademark->pluck('name', 'id');
		
		return view('maintainers.model-vehicles.create', compact('trademarks'));
	}
	
	/**
	 * @param ModelVehicleRequest $request
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function store(ModelVehicleRequest $request)
	{
		try
		{
			if ( ! $this->restore($request) )
			{
				$this->modelVehicle->create($request->all());
			}
			session()->flash('success', 'El registro fue almacenado satisfactoriamente.');
			
			return response()->json(['status' => true, 'url' => '/maintainers/model-vehicles']);
		} catch ( Exception $e )
		{
			$this->log->error("Error Store ModelVehicle: " . $e->getMessage());
			
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
			$modelVehicle = $this->modelVehicle->onlyTrashed()->where('name', $request->get('name'))->where('trademark_id', $request->get('trademark_id'))->firstOrFail();
			
			return $modelVehicle->restore();
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
		$modelVehicle = $this->modelVehicle->findOrFail($id);
		$trademarks   = $this->trademark->pluck('name', 'id');
		
		return view('maintainers.model-vehicles.edit', compact(
			'modelVehicle', 'trademarks'
		));
	}
	
	/**
	 * @param ModelVehicleRequest $request
	 * @param                     $id
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function update(ModelVehicleRequest $request, $id)
	{
		try
		{
			$this->modelVehicle->findOrFail($id)->fill($request->all())->saveOrFail();
			session()->flash('success', 'El registro fue actualizado satisfactoriamente.');
			
			return response()->json(['status' => true, 'url' => '/maintainers/model-vehicles']);
		} catch ( Exception $e )
		{
			$this->log->error("Error Update ModelVehicle: " . $e->getMessage());
			
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
		$this->modelVehicle->destroy($id);
		
		return redirect()->route('model-vehicles.index');
	}
	
}
