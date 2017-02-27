<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Core\Entities\LaborUnion;
use Controlqtime\Http\Requests\LaborUnionRequest;
use Exception;
use Illuminate\Log\Writer as Log;

class LaborUnionController extends Controller
{
    /**
     * @var LaborUnion
     */
    protected $laborUnion;

    /**
     * @var Log
     */
    protected $log;

    /**
     * LaborUnionController constructor.
     *
     * @param LaborUnion $laborUnion
     * @param Log        $log
     */
    public function __construct(LaborUnion $laborUnion, Log $log)
    {
        $this->laborUnion = $laborUnion;
        $this->log = $log;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $laborUnions = $this->laborUnion->all();

        return view('maintainers.labor-unions.index', compact('laborUnions'));
    }

    /**
     * @return mixed for Bootstrap-Table
     */
    public function getLaborUnions()
    {
        $laborUnions = $this->laborUnion->all();

        return $laborUnions;
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
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(LaborUnionRequest $request)
    {
        try {
            if (!$this->restore($request)) {
                $this->laborUnion->create($request->all());
            }
            session()->flash('success', 'El registro fue almacenado satisfactoriamente.');

            return response()->json(['status' => true, 'url' => '/maintainers/labor-unions']);
        } catch (Exception $e) {
            $this->log->error('Error Store LaborUnion: '.$e->getMessage());

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
            $laborUnion = $this->laborUnion->onlyTrashed()->where('name', $request->get('name'))->firstOrFail();

            return $laborUnion->restore();
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
        $laborUnion = $this->laborUnion->findOrFail($id);

        return view('maintainers.labor-unions.edit', compact('laborUnion'));
    }

    /**
     * @param LaborUnionRequest $request
     * @param                   $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(LaborUnionRequest $request, $id)
    {
        try {
            $this->laborUnion->findOrFail($id)->fill($request->all())->saveOrFail();
            session()->flash('success', 'El registro fue actualizado satisfactoriamente.');

            return response()->json(['status' => true, 'url' => '/maintainers/labor-unions']);
        } catch (Exception $e) {
            $this->log->error('Error Update LaborUnion: '.$e->getMessage());

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
            $this->laborUnion->destroy($id);
            session()->flash('success', 'El registro fue eliminado satisfactoriamente.');

            return redirect()->route('labor-unions.index');
        } catch (Exception $e) {
            $this->log->error('Error Delete LaborUnion: '.$e->getMessage());

            return response()->json(['status' => false]);
        }
    }
}
