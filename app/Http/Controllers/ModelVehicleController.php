<?php

namespace Controlqtime\Http\Controllers;

use Exception;
use Controlqtime\Core\Entities\Trademark;
use Controlqtime\Core\Entities\ModelVehicle;
use Controlqtime\Http\Requests\ModelVehicleRequest;

class ModelVehicleController extends Controller
{
	/**
	 * @var Trademark
	 */
	protected $trademark;
	
	/**
	 * @var ModelVehicle
	 */
	protected $modelVehicle;
	
	/**
	 * ModelVehicleController constructor.
	 *
	 * @param ModelVehicle $modelVehicle
	 * @param Trademark    $trademark
	 */
	public function __construct(ModelVehicle $modelVehicle, Trademark $trademark)
	{
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
		if ( ! $this->restore($request) )
		{
			$this->modelVehicle->create($request->all());
		}
		
		return response()->json([
			'success' => true,
			'url'     => '/maintainers/model-vehicles'
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
			
			return response()->json([
				'success' => true,
				'url'     => '/maintainers/model-vehicles'
			]);
		} catch ( Exception $e )
		{
			return response()->json(['success' => false]);
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
