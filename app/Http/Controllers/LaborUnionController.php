<?php

namespace Controlqtime\Http\Controllers;

use Exception;
use Controlqtime\Core\Entities\LaborUnion;
use Controlqtime\Http\Requests\LaborUnionRequest;

class LaborUnionController extends Controller
{
	/**
	 * @var LaborUnion
	 */
	protected $laborUnion;
	
	/**
	 * LaborUnionController constructor.
	 *
	 * @param LaborUnion $laborUnion
	 */
	public function __construct(LaborUnion $laborUnion)
	{
		$this->laborUnion = $laborUnion;
	}
	
	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		$laborUnions = $this->laborUnion->all();
		
		return view('maintainers.labor-unions.index', compact('laborUnions'));
	}
	
	/**
	 * @return mixed for Bootstrap-Table
	 */
	public function getLaborUnions()
	{
		$laborUnions = $this->laborUnion->all();
		
		return $laborUnions;
	}
	
	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function create()
	{
		return view('maintainers.labor-unions.create');
	}
	
	/**
	 * @param LaborUnionRequest $request
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function store(LaborUnionRequest $request)
	{
		if ( ! $this->restore($request) )
		{
			$this->laborUnion->create($request->all());
		}
		
		return response()->json([
			'success' => true,
			'url'     => '/maintainers/labor-unions'
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
			$laborUnion = $this->laborUnion->onlyTrashed()->where('name', $request->get('name'))->firstOrFail();
			
			return $laborUnion->restore();
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
		$laborUnion = $this->laborUnion->findOrFail($id);
		
		return view('maintainers.labor-unions.edit', compact('laborUnion'));
	}
	
	/**
	 * @param LaborUnionRequest $request
	 * @param                   $id
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function update(LaborUnionRequest $request, $id)
	{
		try
		{
			$this->laborUnion->findOrFail($id)->fill($request->all())->saveOrFail();
			session()->flash('success', 'El registro fue actualizado satisfactoriamente.');
			
			return response()->json([
				'success' => true,
				'url'     => '/maintainers/labor-unions'
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
		$this->laborUnion->destroy($id);
		
		return redirect()->route('labor-unions.index');
	}
}
