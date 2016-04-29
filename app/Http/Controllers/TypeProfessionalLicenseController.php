<?php

namespace Controlqtime\Http\Controllers;

use Illuminate\Http\Request;

use Controlqtime\Http\Requests;
use Illuminate\Support\Facades\Session;
use Controlqtime\TypeProfessionalLicense;
use Controlqtime\Http\Requests\TypeProfessionalLicenseRequest;


class TypeProfessionalLicenseController extends Controller
{
    public function index(Request $request)
    {
        $type_professional_licenses = TypeProfessionalLicense::name($request->get('table_search'))->orderBy('name')->paginate(20);
        return view('maintainers.type-professional-licenses.index', compact('type_professional_licenses'));
    }

    public function create()
    {
        return view('maintainers.type-professional-licenses.create');
    }

    public function store(TypeProfessionalLicenseRequest $request)
    {
        TypeProfessionalLicense::create($request->all());
        Session::flash('success', 'El registro fue almacenado satisfactoriamente.');
        return redirect()->route('maintainers.type-professional-licenses.index');
    }

    public function edit($id)
    {
        $type_professional_license = TypeProfessionalLicense::findOrFail($id);
        return view('maintainers.type-professional-licenses.edit', compact('type_professional_license'));
    }

    public function update(TypeProfessionalLicenseRequest $request, $id)
    {
        $type_professional_license = TypeProfessionalLicense::findOrFail($id);
        $message = 'El registro ' . $type_professional_license->name . ' fue actualizado satisfactoriamente.';
        $type_professional_license->fill($request->all());
        $type_professional_license->save();
        Session::flash('success', $message);
        return redirect()->route('maintainers.type-professional-licenses.index');
    }

    public function destroy($id)
    {
        $type_professional_license = TypeProfessionalLicense::findOrFail($id);
        $type_professional_license->delete();
        Session::flash('success', 'El registro ' . $type_professional_license->name . ' fue eliminado satisfactoriamente.');
        return redirect()->route('maintainers.type-professional-licenses.index');
    }
}
