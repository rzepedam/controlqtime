<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\City;
use App\Country;
use App\Http\Requests\CityRequest;
use Illuminate\Support\Facades\Session;

class CityController extends Controller
{
    public function index(Request $request)
    {
        $cities = City::name($request->get('table_search'))->orderBy('name')->paginate(20);
        return view('maintainers.cities.index', compact('cities'));
    }

    public function create()
    {
        $countries = Country::lists('name', 'id');
        return view('maintainers.cities.create', compact('countries'));
    }

    public function store(CityRequest $request)
    {
        City::create($request->all());
        Session::flash('success', 'El registro fue almacenado satisfactoriamente.');
        return redirect()->route('maintainers.cities.index');
    }

    public function edit($id)
    {
        $city      = City::findOrFail($id);
        $countries = Country::lists('name', 'id');
        return view('maintainers.cities.edit', compact('city', 'countries'));
    }

    public function update(CityRequest $request, $id)
    {
        $city    = City::findOrFail($id);
        $message = 'El registro ' . $city->name . ' fue actualizado satisfactoriamente.';
        $city->fill($request->all());
        $city->save();
        Session::flash('success', $message);
        return redirect()->route('maintainers.cities.index');
    }

    public function destroy($id)
    {
        $city = City::findOrFail($id);
        $city->delete();
        Session::flash('success', 'El registro ' . $city->name . ' fue eliminado satisfactoriamente.');
        return redirect()->route('maintainers.cities.index');
    }
}
