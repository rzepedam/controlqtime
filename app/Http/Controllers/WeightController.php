<?php

namespace Controlqtime\Http\Controllers;

use Exception;
use Controlqtime\Core\Entities\Weight;
use Controlqtime\Http\Requests\WeightRequest;

class WeightController extends Controller
{
	/**
	 * @var Weight
	 */
	protected $weight;
	
	/**
	 * WeightController constructor.
	 *
	 * @param Weight $weight
	 */
	public function __construct(Weight $weight)
	{
		$this->weight = $weight;
	}
	
	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		return view('maintainers.measuring-units.weights.index');
	}
	
	/**
	 * @return mixed for Bootstrap-Table
	 */
	public function getWeights()
	{
		$weights = $this->weight->all();
		
		return $weights;
	}
	
	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function create()
	{
		return view('maintainers.measuring-units.weights.create');
	}
	
	/**
	 * @param WeightRequest $request
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function store(WeightRequest $request)
	{
		if ( ! $this->restore($request) )
		{
			$this->weight->create($request->all());
		}
		
		return response()->json([
			'success' => true,
			'url'     => '/maintainers/measuring-units/weights'
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
			$weight = $this->weight->onlyTrashed()->where('name', $request->get('name'))->where('acr', $request->get('acr'))->firstOrFail();
			
			return $weight->restore();
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
		$weight = $this->weight->findOrFail($id);
		
		return view('maintainers.measuring-units.weights.edit', compact('weight'));
	}
	
	/**
	 * @param WeightRequest $request
	 * @param $id
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function update(WeightRequest $request, $id)
	{
		try
		{
			$this->weight->findOrFail($id)->fill($request->all())->saveOrFail();
			session()->flash('success', 'El registro fue actualizado satisfactoriamente.');
			
			return response()->json([
				'success' => true,
				'url'     => '/maintainers/measuring-units/weights'
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
		$this->weight->destroy($id);
		
		return redirect()->route('weights.index');
	}
	
}
