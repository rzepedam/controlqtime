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
        $route_sheets = RouteSheet::with(['rounds'])->orderBy('id', 'DESC')->paginate(20);
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

        $response = array(
            'status' => 'success',
            'url' => '/operations/route-sheets'
        );

        return response()->json([
            $response
        ], 200);
    }

    public function show($id)
    {
        $route_sheet = RouteSheet::with(['rounds'])->find($id);
        return view('operations.route-sheets.show', compact('route_sheet'));
    }

    public function update(RouteSheetRequest $request, $id)
    {
        dd($request->all());
    }
}
