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
        $areas = $this->area->all(['terminal']);
        return view('maintainers.areas.index', compact('areas'));
    }

    public function create()
    {
        $terminals = $this->terminal->lists('name', 'id');
        return view('maintainers.areas.create', compact('terminals'));
    }

    public function store(AreaRequest $request)
    {
        $this->area->create($request->all());
        return redirect()->route('maintainers.areas.index');
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
        return redirect()->route('maintainers.areas.index');
    }

    public function destroy($id)
    {
        $this->area->delete($id);
        return redirect()->route('maintainers.areas.index');
    }
}
