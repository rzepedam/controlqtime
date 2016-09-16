<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Http\Requests\ModelVehicleRequest;
use Controlqtime\Core\Contracts\TrademarkRepoInterface;
use Controlqtime\Core\Contracts\ModelVehicleRepoInterface;

class ModelVehicleController extends Controller
{
    /**
     * @var TrademarkRepoInterface
     */
    protected $trademark;

    /**
     * @var ModelVehicleRepoInterface
     */
    protected $model_vehicle;

    /**
     * ModelVehicleController constructor.
     * @param ModelVehicleRepoInterface $model_vehicle
     * @param TrademarkRepoInterface $trademark
     */
    public function __construct(ModelVehicleRepoInterface $model_vehicle, TrademarkRepoInterface $trademark)
    {
        $this->model_vehicle = $model_vehicle;
        $this->trademark     = $trademark;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('maintainers.model-vehicles.index');
    }

    /**
     * @return mixed for Bootstrap-Table
     */
    public function getModelVehicles()
    {
        $model_vehicles = $this->model_vehicle->all(['trademark']);

        return $model_vehicles;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $trademarks = $this->trademark->lists('name', 'id');

        return view('maintainers.model-vehicles.create', compact('trademarks'));
    }

    /**
     * @param ModelVehicleRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(ModelVehicleRequest $request)
    {
        $this->model_vehicle->create($request->all());

        return response()->json([
            'success' => true,
            'url'     => '/maintainers/model-vehicles'
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $model_vehicle = $this->model_vehicle->find($id);
        $trademarks    = $this->trademark->lists('name', 'id');

        return view('maintainers.model-vehicles.edit', compact(
            'model_vehicle', 'trademarks'
        ));
    }

    /**
     * @param ModelVehicleRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(ModelVehicleRequest $request, $id)
    {
        $this->model_vehicle->update($request->all(), $id);

        return response()->json([
            'success' => true,
            'url'     => '/maintainers/model-vehicles'
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $this->model_vehicle->delete($id);

        return redirect()->route('model-vehicles.index');
    }

}
