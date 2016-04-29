<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Http\Requests\RouteRequest;
use Controlqtime\Route;
use Controlqtime\Terminal;
use Illuminate\Http\Request;

use Controlqtime\Http\Requests;
use Illuminate\Support\Facades\Session;

class RouteController extends Controller
{
    public function index(Request $request)
    {
        $routes = Route::name($request->get('table_search'))->orderBy('id', 'DESC')->paginate(20);
        return view('maintainers.routes.index', compact('routes'));
    }

    public function create()
    {
        $terminals = Terminal::lists('name', 'id');
        return view('maintainers.routes.create', compact('terminals'));
    }

    public function store(RouteRequest $request)
    {
        Route::create($request->all());
        Session::flash('success', 'El registro fue almacenado satisfactoriamente.');
        return redirect()->route('maintainers.routes.index');
    }

    public function edit($id)
    {
        $terminals = Terminal::lists('name', 'id');
        $route = Route::findOrFail($id);
        return view('maintainers.routes.edit', compact('route', 'terminals'));
    }

    public function update(RouteRequest $request, $id)
    {
        $route = Route::findOrFail($id);
        $message = 'El registro ' . $route->name . ' fue actualizado satisfactoriamente.';
        $route->fill($request->all());
        $route->save();
        Session::flash('success', $message);
        return redirect()->route('maintainers.routes.index');
    }

    public function destroy($id)
    {
        $route = Route::findOrFail($id);
        $route->delete();
        Session::flash('success', 'El registro ' . $route->name . ' fue eliminado satisfactoriamente.');
        return redirect()->route('maintainers.routes.index');
    }
}
