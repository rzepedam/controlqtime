<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Company;
use App\Country;
use App\Rating;
use App\Region;
use App\Province;
use App\Commune;

class CompanyController extends Controller
{
	public function index(Request $request)
    {
        $companies = Company::name($request->get('table_search'))->orderBy('name')->paginate(20);
        return view('maintainers.companies.index', compact('companies'));
    }

    public function create()
    {
        $countries = Country::lists('name', 'id');
        $ratings   = Rating::lists('name', 'id');
        $regions   = Region::lists('name', 'id');
        $provinces = Province::lists('name', 'id');
        $communes  = Commune::lists('name', 'id');
        return view('maintainers.companies.create', compact('countries', 'ratings', 'regions', 'provinces', 'communes'));
    }

    public function store(CompanyRequest $request)
    {
        Company::create($request->all());
        Session::flash('success', 'El registro fue almacenado satisfactoriamente');
        return redirect()->route('maintainers.companies.index');
    }

    public function edit($id)
    {
        $company = Company::findOrFail($id);
        return view('maintainers.companies.edit', compact('company'));
    }

    public function update(CompanyRequest $request, $id)
    {
        $company = Company::findOrFail($id);
        $message = $company->name . ' fue actualizado satisfactoriamente';
        $company->fill($request->all());
        $company->save();
        Session::flash('success', $message);
        return redirect()->route('maintainers.companies.index');
    }

    public function destroy($id)
    {
        $company = Company::findOrFail($id);
        $company->delete();
        Session::flash('success', $company->name . ' fue eliminado de nuestros registros');
        return redirect()->route('maintainers.companies.index');
    }
}
