<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Core\Repositories\LaborUnionRepo;
use Controlqtime\Http\Requests\LaborUnionRequest;
use Controlqtime\Http\Requests;

class LaborUnionController extends Controller
{
	protected $labor_union;

	public function __construct(LaborUnionRepo $labor_union)
	{
		$this->labor_union = $labor_union;
	}

	public function index()
	{
		$labor_unions = $this->labor_union->all();
		return view('maintainers.labor-unions.index', compact('labor_unions'));
	}

	public function create()
	{
		return view('maintainers.labor-unions.create');
	}

	public function store(LaborUnionRequest $request)
	{
		$this->labor_union->create($request->all());

		return response()->json(array(
			'success' => true,
			'url'     => '/maintainers/labor-unions'
		));
	}

	public function edit($id)
	{
		$labor_union = $this->labor_union->find($id);
		return view('maintainers.labor-unions.edit', compact('labor_union'));
	}

	public function update(LaborUnionRequest $request, $id)
	{
		$this->labor_union->update($request->all(), $id);

		return response()->json(array(
			'success' => true,
			'url'     => '/maintainers/labor-unions'
		));
	}

	public function destroy($id)
	{
		$this->labor_union->delete($id);
		return redirect()->route('maintainers.labor-unions.index');
	}
}
