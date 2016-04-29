<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Http\Requests\ModelVehicleRequest;
use Controlqtime\ModelVehicle;
use Controlqtime\Trademark;
use Illuminate\Http\Request;

use Controlqtime\Http\Requests;
use Illuminate\Support\Facades\Session;

class ModelVehicleController extends Controller
{
    public function index(Request $request)
    {
        $model_vehicles = ModelVehicle::name($request->get('table_search'))->orderBy('name')->paginate(20);
        return view('maintainers.model-vehicles.index', compact('model_vehicles'));
    }

    public function create()
    {
        $trademarks = Trademark::lists('name', 'id');
        return view('maintainers.model-vehicles.create', compact('trademarks'));
    }

    public function store(ModelVehicleRequest $request)
    {
        ModelVehicle::create($request->all());
        Session::flash('success', 'El registro fue almacenado satisfactoriamente.');
        return redirect()->route('maintainers.model-vehicles.index');
    }

    public function edit($id)
    {
        $model_vehicle = ModelVehicle::findOrFail($id);
        $trademarks = Trademark::lists('name', 'id');
        return view('maintainers.model-vehicles.edit', compact(
            'model_vehicle', 'trademarks'
        ));
    }

    public function update(ModelVehicleRequest $request, $id)
    {
        $model_vehicle = ModelVehicle::findOrFail($id);
        $message = 'El registro ' . $model_vehicle->name . ' fue actualizado satisfactoriamente.';
        $model_vehicle->fill($request->all());
        $model_vehicle->save();
        Session::flash('success', $message);
        return redirect()->route('maintainers.model-vehicles.index');
    }

    public function destroy($id)
    {
        $model_vehicle = ModelVehicle::findOrFail($id);
        $model_vehicle->delete();
        Session::flash('success', 'El registro ' . $model_vehicle->name . ' fue eliminado satisfactoriamente.');
        return redirect()->route('maintainers.model-vehicles.index');
    }
    
}
