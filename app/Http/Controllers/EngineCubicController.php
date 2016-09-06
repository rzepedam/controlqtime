<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Core\Contracts\EngineCubicRepoInterface;
use Controlqtime\Http\Requests\EngineCubicRequest;
use Illuminate\Http\Request;

use Controlqtime\Http\Requests;

class EngineCubicController extends Controller
{
	protected $engine_cubic;

	public function __construct(EngineCubicRepoInterface $engine_cubic)
	{
		$this->engine_cubic = $engine_cubic;
	}

	public function index()
	{
		return view('maintainers.measuring-units.engine-cubics.index');
	}

	public function getEngineCubics()
	{
		$engine_cubics = $this->engine_cubic->all();
		return $engine_cubics;
	}

	public function create()
	{
		return view('maintainers.measuring-units.engine-cubics.create');
	}

	public function store(EngineCubicRequest $request)
	{
		$this->engine_cubic->create($request->all());

		return response()->json(array(
			'success' => true,
			'url'     => '/maintainers/measuring-units/engine-cubics'
		));
	}

	public function edit($id)
	{
		$engine_cubic = $this->engine_cubic->find($id);
		return view('maintainers.measuring-units.engine-cubics.edit', compact('engine_cubic'));
	}

	public function update(EngineCubicRequest $request, $id)
	{
		$this->engine_cubic->update($request->all(), $id);

		return response()->json(array(
			'success' => true,
			'url'     => '/maintainers/measuring-units/engine-cubics'
		));
	}

	public function destroy($id)
	{
		$this->engine_cubic->delete($id);
		return redirect()->route('engine-cubics.index');
	}
}
