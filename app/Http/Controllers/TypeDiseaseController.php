<?php

namespace Controlqtime\Http\Controllers;

use Exception;
use Controlqtime\Core\Entities\TypeDisease;
use Controlqtime\Http\Requests\TypeDiseaseRequest;

class TypeDiseaseController extends Controller
{
	/**
	 * @var TypeDisease
	 */
	protected $typeDisease;
	
	/**
	 * TypeDiseaseController constructor.
	 *
	 * @param TypeDisease $typeDisease
	 */
	public function __construct(TypeDisease $typeDisease)
	{
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
		if ( ! $this->restore($request) )
		{
			$this->typeDisease->create($request->all());
		}
		
		return response()->json([
			'success' => true,
			'url'     => '/maintainers/type-diseases'
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
	public function show($id)
	{
		$typeDisease = $this->typeDisease->find($id);
		
		return view('maintainers.type-diseases.show', compact('typeDisease'));
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
			
			return response()->json([
				'success' => true,
				'url'     => '/maintainers/type-diseases'
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
		$this->typeDisease->destroy($id);
		
		return redirect()->route('type-diseases.index');
	}
}
