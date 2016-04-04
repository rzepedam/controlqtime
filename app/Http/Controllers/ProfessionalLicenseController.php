<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use App\ProfessionalLicense;
use App\Http\Requests\ProfessionalLicenseRequest;


class ProfessionalLicenseController extends Controller
{
    public function index(Request $request)
    {
        $professional_licenses = ProfessionalLicense::name($request->get('table_search'))->orderBy('name')->paginate(20);
        return view('maintainers.professional_licenses.index', compact('professional_licenses'));
    }

    public function create()
    {
        return view('maintainers.professional_licenses.create');
    }

    public function store(ProfessionalLicenseRequest $request)
    {
        ProfessionalLicense::create($request->all());
        Session::flash('success', 'El registro fue almacenado satisfactoriamente.');
        return redirect()->route('maintainers.professional_licenses.index');
    }

    public function edit($id)
    {
        $professional_license = ProfessionalLicense::findOrFail($id);
        return view('maintainers.professional_licenses.edit', compact('professional_license'));
    }

    public function update(ProfessionalLicenseRequest $request, $id)
    {
        $professional_license = ProfessionalLicense::findOrFail($id);
        $message = 'El registro ' . $professional_license->name . ' fue actualizado satisfactoriamente.';
        $professional_license->fill($request->all());
        $professional_license->save();
        Session::flash('success', $message);
        return redirect()->route('maintainers.professional_licenses.index');
    }

    public function destroy($id)
    {
        $professional_license = ProfessionalLicense::findOrFail($id);
        $professional_license->delete();
        Session::flash('success', 'El registro ' . $professional_license->name . ' fue eliminado satisfactoriamente.');
        return redirect()->route('maintainers.professional_licenses.index');
    }
}
