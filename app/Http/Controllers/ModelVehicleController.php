<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Http\Requests;
use Controlqtime\Core\Contracts\ModelVehicleRepoInterface;
use Controlqtime\Http\Requests\ModelVehicleRequest;
use Controlqtime\Core\Contracts\TrademarkRepoInterface;
use Controlqtime\Core\Entities\Trademark;

class ModelVehicleController extends Controller
{
    protected $trademark;
    protected $model_vehicle;

    public function __construct(ModelVehicleRepoInterface $model_vehicle, TrademarkRepoInterface $trademark)
    {
        $this->model_vehicle = $model_vehicle;
        $this->trademark = $trademark;
    }

    public function index()
    {
        return view('maintainers.model-vehicles.index');
    }

    public function getModelVehicles() {
        $model_vehicles = $this->model_vehicle->all(['trademark']);
        return $model_vehicles;
    }

    public function create()
    {
        $trademarks = Trademark::lists('name', 'id');
        return view('maintainers.model-vehicles.create', compact('trademarks'));
    }

    public function store(ModelVehicleRequest $request)
    {
        $this->model_vehicle->create($request->all());

		return response()->json(array(
			'success' => true,
			'url'     => '/maintainers/model-vehicles'
		));
    }

    public function edit($id)
    {
        $model_vehicle = $this->model_vehicle->find($id);
        $trademarks = $this->trademark->lists('name', 'id');

        return view('maintainers.model-vehicles.edit', compact(
            'model_vehicle', 'trademarks'
        ));
    }

    public function update(ModelVehicleRequest $request, $id)
    {
        $this->model_vehicle->update($request->all(), $id);

		return response()->json(array(
			'success' => true,
			'url'     => '/maintainers/model-vehicles'
		));
    }

    public function destroy($id)
    {
        $this->model_vehicle->delete($id);
        return redirect()->route('maintainers.model-vehicles.index');
    }
    
}
