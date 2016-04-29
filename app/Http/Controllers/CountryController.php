<?php

namespace Controlqtime\Http\Controllers;

use Illuminate\Http\Request;
use Controlqtime\Http\Requests;
use Illuminate\Support\Facades\Session;
use Controlqtime\Http\Requests\CountryRequest;

use Controlqtime\Country;

class CountryController extends Controller
{
    public function index(Request $request)
    {
        $countries = Country::name($request->get('table_search'))->orderBy('name')->paginate(20);
        return view('maintainers.countries.index', compact('countries'));
    }

    public function create()
    {
        return view('maintainers.countries.create');
    }

    public function store(CountryRequest $request)
    {
        Country::create($request->all());
        Session::flash('success', 'El registro fue almacenado satisfactoriamente.');
        return redirect()->route('maintainers.countries.index');
    }

    public function edit($id)
    {
        $country = Country::findOrFail($id);
        return view('maintainers.countries.edit', compact('country'));
    }

    public function update(CountryRequest $request, $id)
    {
        $country = Country::findOrFail($id);
        $message = 'El registro ' . $country->name . ' fue actualizado satisfactoriamente.';
        $country->fill($request->all());
        $country->save();
        Session::flash('success', $message);
        return redirect()->route('maintainers.countries.index');
    }

    public function destroy($id)
    {
        $country = Country::findOrFail($id);
        $country->delete();
        Session::flash('success', 'El registro ' . $country->name . ' fue eliminado satisfactoriamente.');
        return redirect()->route('maintainers.countries.index');
    }
}
