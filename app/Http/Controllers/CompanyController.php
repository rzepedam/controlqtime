<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

use App\Http\Requests\CompanyRequest;
use App\Company;
use App\Nationality;
use App\Region;
use App\Province;
use App\Commune;
use App\LegalRepresentative;
use App\Subsidiary;


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
        $provinces     = Region::first()->provinces->lists('name', 'id');
        $communes      = Province::first()->communes->lists('name', 'id');
        return view('maintainers.companies.create', compact('nationalities', 'regions', 'provinces', 'communes'));
    }

    public function store(CompanyRequest $request)
    {
        dd($request->all());
        $company = Company::create($request->all());

        for ($i = 0; $i < $request->get('count_legal_representative'); $i++) {

            $legal                 = new LegalRepresentative();
            $legal->male_surname   = $request->get('male_surname' . $i);
            $legal->female_surname = $request->get('female_surname' . $i);
            $legal->first_name     = $request->get('first_name' . $i);
            $legal->second_name    = $request->get('second_name' . $i);
            $legal->rut            = $request->get('rut' . $i);
            $legal->birthday       = $request->get('birthday' . $i);
            $legal->nationality_id = $request->get('nationality_id' . $i);
            $legal->email          = $request->get('email' . $i);
            $legal->phone1         = $request->get('phone1-' . $i);
            $legal->phone2         = $request->get('phone2-' . $i);

            $legal->company()->associate($company);
            $legal->save();
        }

        for ($i = 0; $i < $request->get('count_subsidiary'); $i++) {

            $subsidiary                 = new Subsidiary();
            $subsidiary->address        = $request->get('address_suc' . $i);
            $subsidiary->commune_id     = $request->get('commune_suc_id' . $i);
            $subsidiary->num            = $request->get('num_suc' . $i);
            $subsidiary->lot            = $request->get('lot_suc' . $i);
            $subsidiary->ofi            = $request->get('ofi_suc' . $i);
            $subsidiary->floor          = $request->get('floor_suc' . $i);
            $subsidiary->muni_license   = $request->get('muni_license_suc' . $i);
            $subsidiary->email          = $request->get('email_suc' . $i);
            $subsidiary->phone1         = $request->get('phone1_suc-' . $i);
            $subsidiary->phone2         = $request->get('phone2_suc-' . $i);

            $subsidiary->company()->associate($company);
            $subsidiary->save();
        }

        Session::flash('success', 'El registro fue almacenado satisfactoriamente');
        $response = array(
            'status'    => 'success',
            'url'       => '/maintainers/companies'
        );

        return response()->json([$response], 200);
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
