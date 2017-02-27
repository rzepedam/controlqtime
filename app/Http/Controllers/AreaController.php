<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Core\Entities\Area;
use Controlqtime\Core\Entities\Terminal;
use Controlqtime\Http\Requests\AreaRequest;
use Exception;
use Illuminate\Log\Writer as Log;

class AreaController extends Controller
{
    /**
     * @var Area
     */
    protected $area;

    /**
     * @var Log
     */
    protected $log;

    /**
     * @var Terminal
     */
    protected $terminal;

    /**
     * AreaController constructor.
     *
     * @param Area     $area
     * @param Log      $log
     * @param Terminal $terminal
     */
    public function __construct(Area $area, Log $log, Terminal $terminal)
    {
        $this->area = $area;
        $this->log = $log;
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
        $areas = $this->area->with(['terminal'])->get();

        return $areas;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $terminals = $this->terminal->pluck('name', 'id');

        return view('maintainers.areas.create', compact('terminals'));
    }

    /**
     * @param AreaRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(AreaRequest $request)
    {
        try {
            if (!$this->restore($request)) {
                $this->area->create($request->all());
            }
            session()->flash('success', 'El registro fue almacenado satisfactoriamente.');

            return response()->json(['status' => true, 'url' => '/maintainers/areas']);
        } catch (Exception $e) {
            $this->log->error('Error Store Area: '.$e->getMessage());

            return response()->json(['status' => false]);
        }
    }

    /**
     * @param $request
     *
     * @return bool
     */
    public function restore($request)
    {
        try {
            $area = $this->area->onlyTrashed()->where('name', $request->get('name'))->where('terminal_id', $request->get('terminal_id'))->firstOrFail();

            return $area->restore();
        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * @param $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $area = $this->area->findOrFail($id);
        $terminals = $this->terminal->pluck('name', 'id');

        return view('maintainers.areas.edit', compact('area', 'terminals'));
    }

    /**
     * @param AreaRequest $request
     * @param             $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(AreaRequest $request, $id)
    {
        try {
            $this->area->findOrFail($id)->fill($request->all())->saveOrFail();
            session()->flash('success', 'El registro fue actualizado satisfactoriamente.');

            return response()->json(['status' => true, 'url' => '/maintainers/areas']);
        } catch (Exception $e) {
            $this->log->error('Error Update Area: '.$e->getMessage());

            return response()->json(['status' => false]);
        }
    }

    /**
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        try {
            $this->area->destroy($id);
            session()->flash('success', 'El registro fue eliminado satisfactoriamente.');

            return redirect()->route('areas.index');
        } catch (Exception $e) {
            $this->log->error('Error Delete Area: '.$e->getMessage());

            return response()->json(['status' => false]);
        }
    }
}
