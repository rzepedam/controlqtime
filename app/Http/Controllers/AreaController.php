<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Core\Contracts\AreaRepoInterface;
use Controlqtime\Core\Contracts\TerminalRepoInterface;
use Controlqtime\Http\Requests;
use Controlqtime\Http\Requests\AreaRequest;

class AreaController extends Controller
{
    protected $area;
    protected $terminal;

    public function __construct(AreaRepoInterface $area, TerminalRepoInterface $terminal)
    {
        $this->area = $area;
        $this->terminal = $terminal;
    }

	public function index()
    {
        return view('maintainers.areas.index');
    }

    public function getAreas() {
        $areas = $this->area->all(['terminal']);
        return $areas;
    }

    public function create()
    {
        $terminals = $this->terminal->lists('name', 'id');
        return view('maintainers.areas.create', compact('terminals'));
    }

    public function store(AreaRequest $request)
    {
        $this->area->create($request->all());

		return response()->json(array(
			'success' => true,
			'url'     => '/maintainers/areas'
		));
    }

    public function edit($id)
    {
        $area       = $this->area->find($id);
        $terminals  = $this->terminal->lists('name', 'id');
        return view('maintainers.areas.edit', compact('area', 'terminals'));
    }

    public function update(AreaRequest $request, $id)
    {
        $this->area->update($request->all(), $id);

		return response()->json(array(
			'success' => true,
			'url'     => '/maintainers/areas'
		));
    }

    public function destroy($id)
    {
        $this->area->delete($id);
        return redirect()->route('areas.index');
    }
}
