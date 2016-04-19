<?php

namespace App\Http\Controllers;

use App\Http\Requests\TypeVehicleRequest;
use App\TypeVehicle;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class TypeVehicleController extends Controller
{
    public function index(Request $request)
    {
        $type_vehicles = TypeVehicle::name($request->get('table_search'))->orderBy('id', 'DESC')->paginate(20);
        return view('maintainers.type-vehicles.index', compact('type_vehicles'));
    }
    
    public function create()
    {
        return view('maintainers.type-vehicles.create');
    }


    public function store(TypeVehicleRequest $request)
    {
        TypeVehicle::create($request->all());
        Session::flash('success', 'El registro fue almacenado satisfactoriamente.');
        return redirect()->route('maintainers.type-vehicles.index');
    }

    public function edit($id)
    {
        $type_vehicle = TypeVehicle::findOrFail($id);
        return view('maintainers.type-vehicles.edit', compact('type_vehicle'));
    }

    public function update(TypeVehicleRequest $request, $id)
    {
        $type_vehicle = TypeVehicle::findOrFail($id);
        $message = 'El registro ' . $type_vehicle->name . ' fue actualizado satisfactoriamente.';
        $type_vehicle->fill($request->all());
        $type_vehicle->save();
        Session::flash('success', $message);
        return redirect()->route('maintainers.type-vehicles.index');
    }

    public function destroy($id)
    {
        $type_vehicle = TypeVehicle::findOrFail($id);
        $type_vehicle->delete();
        Session::flash('success', 'El registro ' . $type_vehicle->name . ' fue eliminado satisfactoriamente.');
        return redirect()->route('maintainers.type-vehicles.index');
    }

}
