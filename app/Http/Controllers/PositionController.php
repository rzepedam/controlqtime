<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Core\Entities\Position;
use Controlqtime\Http\Requests\PositionRequest;
use Exception;
use Illuminate\Log\Writer as Log;

class PositionController extends Controller
{
    /**
     * @var Log
     */
    protected $log;

    /**
     * @var Position
     */
    protected $position;

    /**
     * PositionController constructor.
     *
     * @param Log      $log
     * @param Position $position
     */
    public function __construct(Log $log, Position $position)
    {
        $this->log = $log;
        $this->position = $position;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('maintainers.positions.index');
    }

    /**
     * @return mixed for Bootstrap-Table
     */
    public function getPositions()
    {
        $positions = $this->position->all();

        return $positions;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('maintainers.positions.create');
    }

    /**
     * @param PositionRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(PositionRequest $request)
    {
        try {
            if (!$this->restore($request)) {
                $this->position->create($request->all());
            }
            session()->flash('success', 'El registro fue almacenado satisfactoriamente.');

            return response()->json(['status' => true, 'url' => '/maintainers/positions']);
        } catch (Exception $e) {
            $this->log->error('Error Store Position: '.$e->getMessage());

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
            $position = $this->position->onlyTrashed()->where('name', $request->get('name'))->firstOrFail();

            return $position->restore();
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
        $position = $this->position->findOrFail($id);

        return view('maintainers.positions.edit', compact('position'));
    }

    /**
     * @param PositionRequest $request
     * @param                 $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(PositionRequest $request, $id)
    {
        try {
            $this->position->findOrFail($id)->fill($request->all())->saveOrFail();
            session()->flash('success', 'El registro fue actualizado satisfactoriamente.');

            return response()->json(['status' => true, 'url' => '/maintainers/positions']);
        } catch (Exception $e) {
            $this->log->error('Error Update Position: '.$e->getMessage());

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
            $this->position->destroy($id);
            session()->flash('success', 'El registro fue eliminado satisfactoriamente.');

            return redirect()->route('positions.index');
        } catch (Exception $e) {
            $this->log->error('Error Delete Position: '.$e->getMessage());

            return response()->json(['status' => false]);
        }
    }
}
