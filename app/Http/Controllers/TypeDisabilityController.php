<?php

namespace Controlqtime\Http\Controllers;

use Exception;
use Illuminate\Log\Writer as Log;
use Controlqtime\Core\Entities\TypeDisability;
use Controlqtime\Http\Requests\TypeDisabilityRequest;

class TypeDisabilityController extends Controller
{
	/**
	 * @var Log
	 */
	protected $log;
	
	/**
	 * @var TypeDisability
	 */
	protected $typeDisability;
	
	/**
	 * TypeDisabilityController constructor.
	 *
	 * @param Log            $log
	 * @param TypeDisability $typeDisability
	 */
	public function __construct(Log $log, TypeDisability $typeDisability)
	{
		$this->log            = $log;
		$this->typeDisability = $typeDisability;
	}
	
	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		return view('maintainers.type-disabilities.index');
	}
	
	/**
	 * @return mixed for Bootstrap-Table
	 */
	public function getTypeDisabilities()
	{
		$type_disabilities = $this->typeDisability->all();
		
		return $type_disabilities;
	}
	
	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function create()
	{
		return view('maintainers.type-disabilities.create');
	}
	
	/**
	 * @param TypeDisabilityRequest $request
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function store(TypeDisabilityRequest $request)
	{
		try
		{
			if ( ! $this->restore($request) )
			{
				$this->typeDisability->create($request->all());
			}
			session()->flash('success', 'El registro fue almacenado satisfactoriamente.');
			
			return response()->json(['status' => true, 'url' => '/maintainers/type-disabilities']);
		} catch ( Exception $e )
		{
			$this->log->error("Error Store TypeDisability: " . $e->getMessage());
			
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
			$typeDisability = $this->typeDisability->onlyTrashed()->where('name', $request->get('name'))->firstOrFail();
			
			return $typeDisability->restore();
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
		$typeDisability = $this->typeDisability->findOrFail($id);
		
		return view('maintainers.type-disabilities.edit', compact('typeDisability'));
	}
	
	/**
	 * @param TypeDisabilityRequest $request
	 * @param                       $id
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function update(TypeDisabilityRequest $request, $id)
	{
		try
		{
			$this->typeDisability->findOrFail($id)->fill($request->all())->saveOrFail();
			session()->flash('success', 'El registro fue actualizado satisfactoriamente.');
			
			return response()->json(['status' => true, 'url' => '/maintainers/type-disabilities']);
		} catch ( Exception $e )
		{
			$this->log->error("Error Update TypeDisability: " . $e->getMessage());
			
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
			$this->typeDisability->destroy($id);
			session()->flash('success', 'El registro fue eliminado satisfactoriamente.');
			
			return redirect()->route('type-disabilities.index');
		} catch ( Exception $e )
		{
			$this->log->error("Error Delete TypeDisability: " . $e->getMessage());
			
			return response()->json(['status' => false]);
		}
	}
}
