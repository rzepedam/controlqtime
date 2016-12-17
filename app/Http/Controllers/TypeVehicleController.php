<?php

namespace Controlqtime\Http\Controllers;

use Exception;
use Illuminate\Log\Writer as Log;
use Controlqtime\Core\Entities\Weight;
use Controlqtime\Core\Entities\TypeVehicle;
use Controlqtime\Core\Entities\EngineCubic;
use Controlqtime\Http\Requests\TypeVehicleRequest;

class TypeVehicleController extends Controller
{
	/**
	 * @var Log
	 */
	protected $log;
	
	/**
	 * @var EngineCubic
	 */
	protected $engineCubic;
	
	/**
	 * @var TypeVehicle
	 */
	protected $typeVehicle;
	
	/**
	 * @var Weight
	 */
	protected $weight;
	
	/**
	 * TypeVehicleController constructor.
	 *
	 * @param EngineCubic $engineCubic
	 * @param Log         $log
	 * @param TypeVehicle $typeVehicle
	 * @param Weight      $weight
	 */
	public function __construct(EngineCubic $engineCubic, Log $log, TypeVehicle $typeVehicle, Weight $weight)
	{
		$this->engineCubic = $engineCubic;
		$this->log         = $log;
		$this->typeVehicle = $typeVehicle;
		$this->weight      = $weight;
	}
	
	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		return view('maintainers.type-vehicles.index');
	}
	
	/**
	 * @return mixed for Bootstrap-Table
	 */
	public function getTypeVehicles()
	{
		$typeVehicles = $this->typeVehicle->with(['engineCubic', 'weight'])->get();
		
		return $typeVehicles;
	}
	
	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function create()
	{
		$engineCubics = $this->engineCubic->pluck('acr', 'id');
		$weights      = $this->weight->pluck('acr', 'id');
		
		return view('maintainers.type-vehicles.create', compact('engineCubics', 'weights'));
	}
	
	/**
	 * @param TypeVehicleRequest $request
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function store(TypeVehicleRequest $request)
	{
		try
		{
			if ( ! $this->restore($request) )
			{
				$this->typeVehicle->create($request->all());
			}
			session()->flash('success', 'El registro fue almacenado satisfactoriamente.');
			
			return response()->json(['status' => true, 'url' => '/maintainers/type-vehicles']);
		} catch ( Exception $e )
		{
			$this->log->error("Error Store TypeVehicle: " . $e->getMessage());
			
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
			$typeVehicle = $this->typeVehicle->onlyTrashed()->where('name', $request->get('name'))->firstOrFail();
			
			return $typeVehicle->restore();
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
		$engineCubics = $this->engineCubic->pluck('acr', 'id');
		$typeVehicle  = $this->typeVehicle->findOrFail($id);
		$weights      = $this->weight->pluck('acr', 'id');
		
		return view('maintainers.type-vehicles.edit', compact(
			'engineCubics', 'typeVehicle', 'weights'
		));
	}
	
	/**
	 * @param TypeVehicleRequest $request
	 * @param                    $id
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function update(TypeVehicleRequest $request, $id)
	{
		try
		{
			$this->typeVehicle->findOrFail($id)->fill($request->all())->saveOrFail();
			session()->flash('success', 'El registro fue actualizado satisfactoriamente.');
			
			return response()->json(['status' => true, 'url' => '/maintainers/type-vehicles']);
		} catch ( Exception $e )
		{
			$this->log->error("Error Update TypeVehicle: " . $e->getMessage());
			
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
		$this->typeVehicle->destroy($id);
		
		return redirect()->route('type-vehicles.index');
	}
	
}
