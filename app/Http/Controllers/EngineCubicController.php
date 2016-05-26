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
		$engine_cubics = $this->engine_cubic->all();
		return view('maintainers.measuring-units.engine-cubics.index', compact('engine_cubics'));
	}

	public function create()
	{
		return view('maintainers.measuring-units.engine-cubics.create');
	}

	public function store(EngineCubicRequest $request)
	{
		$this->engine_cubic->create($request->all());
		return redirect()->route('maintainers.measuring-units.engine-cubics.index');
	}

	public function edit($id)
	{
		$engine_cubic = $this->engine_cubic->find($id);
		return view('maintainers.measuring-units.engine-cubics.edit', compact('engine_cubic'));
	}

	public function update(EngineCubicRequest $request, $id)
	{
		$this->engine_cubic->update($request->all(), $id);
		return redirect()->route('maintainers.measuring-units.engine-cubics.index');
	}

	public function destroy($id)
	{
		$this->engine_cubic->delete($id);
		return redirect()->route('maintainers.measuring-units.engine-cubics.index');
	}
}
