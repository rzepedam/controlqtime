<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Http\Requests\WeightRequest;
use Controlqtime\Core\Contracts\WeightRepoInterface;

class WeightController extends Controller
{
	/**
	 * @var WeightRepoInterface
	 */
	protected $weight;
	
	/**
	 * WeightController constructor.
	 *
	 * @param WeightRepoInterface $weight
	 */
	public function __construct(WeightRepoInterface $weight)
	{
		$this->weight = $weight;
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
	public function index()
	{
		return view('maintainers.measuring-units.weights.index');
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
		$weight = $this->weight->onlyTrashedComposed('name', 'acr', $request->get('name'), $request->get('acr'));
		
		if ( ! $weight )
		{
			$this->weight->create($request->all());
		}
		
		return response()->json([
			'success' => true,
			'url'     => '/maintainers/measuring-units/weights'
		]);
	}
	
	/**
	 * @param $id
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function edit($id)
	{
		$weight = $this->weight->find($id);
		
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
		$this->weight->update($request->all(), $id);
		
		return response()->json([
			'success' => true,
			'url'     => '/maintainers/measuring-units/weights'
		]);
	}
	
	/**
	 * @param $id
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function destroy($id)
	{
		$this->weight->delete($id);
		
		return redirect()->route('weights.index');
	}
	
}
