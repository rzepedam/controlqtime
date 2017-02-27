<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Core\Entities\Weight;
use Controlqtime\Http\Requests\WeightRequest;
use Exception;
use Illuminate\Log\Writer as Log;

class WeightController extends Controller
{
    /**
     * @var Log
     */
    protected $log;

    /**
     * @var Weight
     */
    protected $weight;

    /**
     * WeightController constructor.
     *
     * @param Log    $log
     * @param Weight $weight
     */
    public function __construct(Log $log, Weight $weight)
    {
        $this->log = $log;
        $this->weight = $weight;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('maintainers.measuring-units.weights.index');
    }

    /**
     * @return mixed for Bootstrap-Table
     */
    public function getWeights()
    {
        $weights = $this->weight->all();

        return $weights;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('maintainers.measuring-units.weights.create');
    }

    /**
     * @param WeightRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(WeightRequest $request)
    {
        try {
            if (!$this->restore($request)) {
                $this->weight->create($request->all());
            }
            session()->flash('success', 'El registro fue almacenado satisfactoriamente.');

            return response()->json(['status' => true, 'url' => '/maintainers/measuring-units/weights']);
        } catch (Exception $e) {
            $this->log->error('Error Store Weight: '.$e->getMessage());

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
            $weight = $this->weight->onlyTrashed()->where('name', $request->get('name'))->where('acr', $request->get('acr'))->firstOrFail();

            return $weight->restore();
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
        $weight = $this->weight->findOrFail($id);

        return view('maintainers.measuring-units.weights.edit', compact('weight'));
    }

    /**
     * @param WeightRequest $request
     * @param               $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(WeightRequest $request, $id)
    {
        try {
            $this->weight->findOrFail($id)->fill($request->all())->saveOrFail();
            session()->flash('success', 'El registro fue actualizado satisfactoriamente.');

            return response()->json(['status' => true, 'url' => '/maintainers/measuring-units/weights']);
        } catch (Exception $e) {
            $this->log->error('Error Update Weight: '.$e->getMessage());

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
            $this->weight->destroy($id);
            session()->flash('success', 'El registro fue eliminado satisfactoriamente.');

            return redirect()->route('weights.index');
        } catch (Exception $e) {
            $this->log->error('Error Delete Weight: '.$e->getMessage());

            return response()->json(['status' => false]);
        }
    }
}
