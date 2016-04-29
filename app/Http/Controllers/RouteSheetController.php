<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Http\Requests\RouteSheetRequest;
use Controlqtime\Manpower;
use Controlqtime\Route;
use Controlqtime\RouteSheet;
use Controlqtime\Vehicle;
use Illuminate\Http\Request;

use Controlqtime\Http\Requests;
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
        Session::flash('success', 'El registro fue almacenado satisfactoriamente.');
        return redirect()->route('operations.route-sheets.index');
    }

    public function show($id)
    {
        $route_sheet = RouteSheet::with(['rounds'])->find($id);
        return view('operations.route-sheets.show', compact('route_sheet'));
    }

    public function edit($id)
    {
        $route_sheet = RouteSheet::with(['rounds'])->findOrFail($id);
        $manpowers = Manpower::lists('full_name', 'id');
        return view('operations.route-sheets.edit', compact('route_sheet', 'manpowers'));
    }

    public function destroy($id)
    {
        $route_sheet = RouteSheet::findOrFail($id);
        $route_sheet->delete();
        Session::flash('success', 'El registro ' . $route_sheet->name . ' fue eliminado satisfactoriamente.');
        return redirect()->route('operations.route-sheets.index');
    }
    
    public function changeStateRoundSheet(Request $request)
    {
        $route_sheet = RouteSheet::find($request->get('id'));
        $route_sheet->status = 'closed';
        $route_sheet->save();

        $response = array(
            'url' => '/operations/route-sheets'
        );

        return response()->json([
            $response
        ], 200);
    }
    
}
