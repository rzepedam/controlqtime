<?php

namespace App\Http\Controllers;

use Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Country;
use App\Http\Requests\CountryRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CountryController extends Controller
{
    public function index()
    {
        $countries = Country::orderBy('name')->paginate(20);
        return view('maintainers.countries.index', compact('countries'));
    }

    public function create()
    {
        return view('maintainers.countries.create');
    }

    public function store(CountryRequest $request)
    {
        $country = Country::create($request->all());
        Session::flash('success', 'El registro fue almacenado satisfactoriamente');
        return Redirect::route('maintainers.countries.index');
    }

    public function edit($id)
    {
        $country = Country::findOrFail($id);
        return view('maintainers.countries.edit', compact('country'));
    }

    public function update(CountryRequest $request, $id)
    {
        $country = Country::findOrFail($id);
        $message = $country->name . ' fue actualizado satisfactoriamente';
        $country->fill(Request::all());
        $country->save();
        Session::flash('success', $message);
        return Redirect::route('maintainers.countries.index');
    }

    public function destroy($id)
    {
        $country = Country::findOrFail($id);
        $country->delete();
        Session::flash('success', $country->name . ' fue eliminado de nuestros registros');
        return Redirect::route('maintainers.countries.index');

    }
}
