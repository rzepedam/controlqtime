<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Core\Contracts\LaborUnionRepoInterface;
use Controlqtime\Http\Requests\LaborUnionRequest;

/**
 * Class LaborUnionController
 * @package Controlqtime\Http\Controllers
 */
class LaborUnionController extends Controller
{
	/**
	 * @var LaborUnionRepoInterface
	 */
	protected $labor_union;

	/**
	 * LaborUnionController constructor.
	 * @param LaborUnionRepoInterface $labor_union
	 */
	public function __construct(LaborUnionRepoInterface $labor_union)
	{
		$this->labor_union = $labor_union;
	}

	/**
	 * @return mixed for Bootstrap-Table
	 */
	public function getLaborUnions()
	{
		$labor_unions = $this->labor_union->all();

		return $labor_unions;
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		$labor_unions = $this->labor_union->all();

		return view('maintainers.labor-unions.index', compact('labor_unions'));
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
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function store(LaborUnionRequest $request)
	{
		$this->labor_union->create($request->all());

		return response()->json(array(
			'success' => true,
			'url'     => '/maintainers/labor-unions'
		));
	}

	/**
	 * @param $id
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function edit($id)
	{
		$labor_union = $this->labor_union->find($id);
		return view('maintainers.labor-unions.edit', compact('labor_union'));
	}

	/**
	 * @param LaborUnionRequest $request
	 * @param $id
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function update(LaborUnionRequest $request, $id)
	{
		$this->labor_union->update($request->all(), $id);

		return response()->json(array(
			'success' => true,
			'url'     => '/maintainers/labor-unions'
		));
	}

	/**
	 * @param $id
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function destroy($id)
	{
		$this->labor_union->delete($id);
		return redirect()->route('labor-unions.index');
	}
}
