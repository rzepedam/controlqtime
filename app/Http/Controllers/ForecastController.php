<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Forecast;
use App\Http\Requests\ForecastRequest;
use Illuminate\Support\Facades\Session;

class ForecastController extends Controller
{
    public function index(Request $request)
    {
        $forecasts = Forecast::name($request->get('table_search'))->orderBy('name')->paginate(20);
        return view('maintainers.forecasts.index', compact('forecasts'));
    }

    public function create()
    {
        return view('maintainers.forecasts.create');
    }

    public function store(ForecastRequest $request)
    {
        Forecast::create($request->all());
        Session::flash('success', 'El registro fue almacenado satisfactoriamente.');
        return redirect()->route('maintainers.forecasts.index');
    }

    public function edit($id)
    {
        $forecast = Forecast::findOrFail($id);
        return view('maintainers.forecasts.edit', compact('forecast'));
    }

    public function update(ForecastRequest $request, $id)
    {
        $forecast = Forecast::findOrFail($id);
        $message = 'El registro ' . $forecast->name . ' fue actualizado satisfactoriamente.';
        $forecast->fill($request->all());
        $forecast->save();
        Session::flash('success', $message);
        return redirect()->route('maintainers.forecasts.index');
    }

    public function destroy($id)
    {
        $forecast = Forecast::findOrFail($id);
        $forecast->delete();
        Session::flash('success', 'El registro ' . $forecast->name . ' fue eliminado satisfactoriamente.');
        return redirect()->route('maintainers.forecasts.index');
    }

}
