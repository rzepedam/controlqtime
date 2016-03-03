<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Company;
use App\Nationality;
use App\Region;
use App\Province;
use App\Commune;
use App\Http\Requests\CompanyRequest;


class CompanyController extends Controller
{
	public function index(Request $request)
    {
        $companies = Company::firmName($request->get('table_search'))->orderBy('firm_name')->paginate(20);
        return view('maintainers.companies.index', compact('companies'));
    }

    public function create()
    {
        $nationalities = Nationality::lists('name', 'id');
        $regions       = Region::lists('name', 'id');
        $provinces     = Province::lists('name', 'id');
        $communes      = Commune::lists('name', 'id');
        return view('maintainers.companies.create', compact('nationalities', 'regions', 'provinces', 'communes'));
    }

    public function store(CompanyRequest $request)
    {
        dd($request->all());
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
