<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Core\Contracts\PositionRepoInterface;
use Controlqtime\Http\Requests\PositionRequest;

class PositionController extends Controller
{
    protected $position;

    public function __construct(PositionRepoInterface $position)
    {
        $this->position = $position;
    }

    public function index()
    {
        return view('maintainers.positions.index');
    }

    public function getPositions() {
        $positions = $this->position->all();
        return $positions;
    }

    public function create()
    {
        return view('maintainers.positions.create');
    }

    public function store(PositionRequest $request)
    {
        $this->position->create($request->all());

		return response()->json(array(
			'success' => true,
			'url'     => '/maintainers/positions'
		));
    }

    public function edit($id)
    {
        $position = $this->position->find($id);
        return view('maintainers.positions.edit', compact('position'));
    }

    public function update(PositionRequest $request, $id)
    {
        $this->position->update($request->all(), $id);

		return response()->json(array(
			'success' => true,
			'url'     => '/maintainers/positions'
		));
    }

    public function destroy($id)
    {
        $this->position->delete($id);
        return redirect()->route('maintainers.positions.index');
    }
}
