<?php

namespace Controlqtime\Http\Controllers;

use Exception;
use Illuminate\Log\Writer as Log;
use Controlqtime\Core\Entities\TypeDisease;
use Controlqtime\Http\Requests\TypeDiseaseRequest;

class TypeDiseaseController extends Controller
{
	/**
	 * @var Log
	 */
	protected $log;
	
	/**
	 * @var TypeDisease
	 */
	protected $typeDisease;
	
	/**
	 * TypeDiseaseController constructor.
	 *
	 * @param Log         $log
	 * @param TypeDisease $typeDisease
	 */
	public function __construct(Log $log, TypeDisease $typeDisease)
	{
		$this->log         = $log;
		$this->typeDisease = $typeDisease;
	}
	
	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		return view('maintainers.type-diseases.index');
	}
	
	/**
	 * @return mixed for Bootstrap-Table
	 */
	public function getTypeDiseases()
	{
		$typeDiseases = $this->typeDisease->all();
		
		return $typeDiseases;
	}
	
	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function create()
	{
		return view('maintainers.type-diseases.create');
	}
	
	/**
	 * @param TypeDiseaseRequest $request
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function store(TypeDiseaseRequest $request)
	{
		try
		{
			if ( ! $this->restore($request) )
			{
				$this->typeDisease->create($request->all());
			}
			session()->flash('success', 'El registro fue almacenado satisfactoriamente.');
			
			return response()->json(['status' => true, 'url' => '/maintainers/type-diseases']);
		} catch ( Exception $e )
		{
			$this->log->error("Error Store TypeDisease: " . $e->getMessage());
			
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
			$typeDisease = $this->typeDisease->onlyTrashed()->where('name', $request->get('name'))->firstOrFail();
			
			return $typeDisease->restore();
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
		$typeDisease = $this->typeDisease->findOrFail($id);
		
		return view('maintainers.type-diseases.edit', compact('typeDisease'));
	}
	
	/**
	 * @param TypeDiseaseRequest $request
	 * @param                    $id
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function update(TypeDiseaseRequest $request, $id)
	{
		try
		{
			$this->typeDisease->findOrFail($id)->fill($request->all())->saveOrFail();
			session()->flash('success', 'El registro fue actualizado satisfactoriamente.');
			
			return response()->json(['status' => true, 'url' => '/maintainers/type-diseases']);
		} catch ( Exception $e )
		{
			$this->log->error("Error Update TypeDisease: " . $e->getMessage());
			
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
		$this->typeDisease->destroy($id);
		
		return redirect()->route('type-diseases.index');
	}
}
