<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Country;
use App\Http\Requests\CreateCountryRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

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

    public function store(CreateCountryRequest $request)
    {
        $country = Country::create($request->all());
        Session::flash('success', 'El registro fue almacenado satisfactoriamente');
        return Redirect::route('maintainers.countries.index');
    }

    public function destroy($id, Request $request)
    {
        $country = Country::find($id)->delete();
        $message = ' fue eliminado de nuestros registros';
        if ($request->ajax())
        {
            Session::flash('success', $message);
            return redirect()->route('maintainers.countries.index');
        }
    }
}
