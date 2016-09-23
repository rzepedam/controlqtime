<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Http\Requests\AreaRequest;
use Controlqtime\Core\Contracts\AreaRepoInterface;
use Controlqtime\Core\Contracts\TerminalRepoInterface;

class AreaController extends Controller
{
    /**
     * @var AreaRepoInterface
     */
    protected $area;

    /**
     * @var TerminalRepoInterface
     */
    protected $terminal;

    /**
     * AreaController constructor.
     *
     * @param AreaRepoInterface $area
     * @param TerminalRepoInterface $terminal
     */
    public function __construct(AreaRepoInterface $area, TerminalRepoInterface $terminal)
    {
        $this->area     = $area;
        $this->terminal = $terminal;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('maintainers.areas.index');
    }

    /**
     * @return mixed for Bootstrap-Table
     */
    public function getAreas()
    {
        $areas = $this->area->all(['terminal']);

        return $areas;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $terminals = $this->terminal->lists('name', 'id');

        return view('maintainers.areas.create', compact('terminals'));
    }

    /**
     * @param AreaRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(AreaRequest $request)
    {
        $this->area->create($request->all());

        return response()->json([
            'success' => true,
            'url'     => '/maintainers/areas'
        ]);
    }

    /**
     * @param $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $area      = $this->area->find($id);
        $terminals = $this->terminal->lists('name', 'id');

        return view('maintainers.areas.edit', compact('area', 'terminals'));
    }

    /**
     * @param AreaRequest $request
     * @param $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(AreaRequest $request, $id)
    {
        $this->area->update($request->all(), $id);

        return response()->json([
            'success' => true,
            'url'     => '/maintainers/areas'
        ]);
    }

    /**
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $this->area->delete($id);

        return redirect()->route('areas.index');
    }
}
