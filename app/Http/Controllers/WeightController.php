<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Core\Contracts\WeightRepoInterface;
use Controlqtime\Http\Requests\WeightRequest;

use Controlqtime\Http\Requests;

class WeightController extends Controller
{
	protected $weight;

	public function __construct(WeightRepoInterface $weight)
	{
		$this->weight = $weight;
	}

    public function index()
	{
		return view('maintainers.measuring-units.weights.index');
	}

	public function getWeights()
	{
		$weights = $this->weight->all();
		return $weights;
	}

	public function create()
	{
		return view('maintainers.measuring-units.weights.create');
	}

	public function store(WeightRequest $request)
	{
		$this->weight->create($request->all());

		return response()->json(array(
			'success' => true,
			'url'     => '/maintainers/measuring-units/weights'
		));
	}

	public function edit($id)
	{
		$weight = $this->weight->find($id);
		return view('maintainers.measuring-units.weights.edit', compact('weight'));
	}

	public function update(WeightRequest $request, $id)
	{
		$this->weight->update($request->all(), $id);

		return response()->json(array(
			'success' => true,
			'url'     => '/maintainers/measuring-units/weights'
		));
	}

	public function destroy($id)
	{
		$this->weight->delete($id);
		return redirect()->route('maintainers.measuring-units.weights.index');
	}

}
