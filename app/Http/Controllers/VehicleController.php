<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Http\Requests\VehicleRequest;
use Controlqtime\ModelVehicle;
use Controlqtime\Terminal;
use Controlqtime\Trademark;
use Controlqtime\TypeVehicle;
use Controlqtime\Vehicle;
use Illuminate\Http\Request;

use Controlqtime\Http\Requests;
use Illuminate\Support\Facades\Session;

class VehicleController extends Controller
{
    public function index(Request $request)
    {
        $vehicles = Vehicle::patent($request->get('table_search'))->orderBy('id', 'DESC')->paginate(20);
        return view('maintainers.vehicles.index', compact('vehicles'));
    }

    public function create()
    {
        $type_vehicles = TypeVehicle::lists('name', 'id');
        $trademarks = Trademark::lists('name', 'id');
        $firstTrademark = Trademark::first();
        $model_vehicles = Trademark::find($firstTrademark->id)->modelVehicles->lists('name', 'id');
        $terminals = Terminal::lists('name', 'id');

        return view('maintainers.vehicles.create', compact(
            'type_vehicles', 'trademarks', 'model_vehicles', 'terminals'
        ));
    }

    public function store(VehicleRequest $request)
    {
        Vehicle::create($request->all());
        Session::flash('success', 'El registro fue almacenado satisfactoriamente.');
        return redirect()->route('maintainers.vehicles.index');
    }

    public function edit($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        $type_vehicles = TypeVehicle::lists('name', 'id');
        $tempTrade = ModelVehicle::where('id', $vehicle->model_vehicle_id)->first();
        $trademarks = Trademark::lists('name', 'id');
        $model_vehicles = Trademark::find($tempTrade->trademark_id)->modelVehicles->lists('name', 'id');
        $terminals = Terminal::lists('name', 'id');

        return view('maintainers.vehicles.edit', compact(
            'vehicle', 'type_vehicles', 'trademarks', 'model_vehicles', 'terminals'
        ));
    }

    public function update(VehicleRequest $request, $id)
    {
        $vehicle = Vehicle::findOrFail($id);
        $message = 'El registro ' . $vehicle->name . ' fue actualizado satisfactoriamente.';
        $vehicle->fill($request->all());
        $vehicle->save();
        Session::flash('success', $message);
        return redirect()->route('maintainers.vehicles.index');
    }

    public function show($id)
    {
        $vehicle = Vehicle::find($id);
        return view('maintainers.vehicles.show', compact('vehicle'));
    }

    public function destroy($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        $vehicle->delete();
        Session::flash('success', 'El registro ' . $vehicle->name . ' fue eliminado satisfactoriamente.');
        return redirect()->route('maintainers.vehicles.index');
    }
}
