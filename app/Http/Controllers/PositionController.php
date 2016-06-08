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
        $positions = $this->position->all();
        return view('maintainers.positions.index', compact('positions'));
    }

    public function create()
    {
        return view('maintainers.positions.create');
    }

    public function store(PositionRequest $request)
    {
        $this->position->create($request->all());
        return redirect()->route('maintainers.positions.index');
    }

    public function edit($id)
    {
        $position = $this->position->find($id);
        return view('maintainers.positions.edit', compact('position'));
    }

    public function update(PositionRequest $request, $id)
    {
        $this->position->update($request->all(), $id);
        return redirect()->route('maintainers.positions.index');
    }

    public function destroy($id)
    {
        $this->position->delete($id);
        return redirect()->route('maintainers.positions.index');
    }
}