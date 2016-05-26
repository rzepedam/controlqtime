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
		$weights = $this->weight->all();
		return view('maintainers.measuring-units.weights.index', compact('weights'));
	}

	public function create()
	{
		return view('maintainers.measuring-units.weights.create');
	}

	public function store(WeightRequest $request)
	{
		$this->weight->create($request->all());
		return redirect()->route('maintainers.measuring-units.weights.index');
	}

	public function edit($id)
	{
		$weight = $this->weight->find($id);
		return view('maintainers.measuring-units.weights.edit', compact('weight'));
	}

	public function update(WeightRequest $request, $id)
	{
		$this->weight->update($request->all(), $id);
		return redirect()->route('maintainers.measuring-units.weights.index');
	}

	public function destroy($id)
	{
		$this->weight->delete($id);
		return redirect()->route('maintainers.measuring-units.weights.index');
	}

}
