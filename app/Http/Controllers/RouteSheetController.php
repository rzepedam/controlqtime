<?php

namespace App\Http\Controllers;

use App\Http\Requests\RouteSheetRequest;
use App\Manpower;
use App\Route;
use App\RouteSheet;
use App\Vehicle;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class RouteSheetController extends Controller
{
    public function index(Request $request)
    {
        $route_sheets = RouteSheet::orderBy('id', 'DESC')->paginate(20);
        $routes = Route::lists('name', 'id');
        $vehicles = DB::table('type_vehicles')
            ->where('type_vehicles.name', 'Bus')
            ->join('vehicles', 'vehicles.type_vehicle_id', '=', 'type_vehicles.id')
            ->lists('vehicles.patent', 'vehicles.id');

        return view('operations.route-sheets.index', compact(
            'route_sheets', 'routes', 'vehicles'
        ));
    }

    public function create()
    {
        $manpowers = Manpower::lists('full_name', 'id');
        return view('operations.route-sheets.create', compact('manpowers'));
    }

    public function store(RouteSheetRequest $request)
    {
        RouteSheet::create($request->all());
        Session::flash('success', 'El registro fue almacenado satisfactoriamente.');
        return redirect()->route('operations.route-sheets.index');
    }
}
