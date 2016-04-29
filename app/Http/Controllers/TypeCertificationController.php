<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\TypeCertification;
use Illuminate\Http\Request;
use Controlqtime\Http\Requests;
use Illuminate\Support\Facades\Session;

use Controlqtime\Http\Requests\TypeCertificationRequest;

class TypeCertificationController extends Controller
{
    public function index(Request $request)
    {
        $type_certifications = TypeCertification::name($request->get('table_search'))->orderBy('name')->paginate(20);
        return view('maintainers.type-certifications.index', compact('type_certifications'));
    }

    public function create()
    {
        return view('maintainers.type-certifications.create');
    }

    public function store(TypeCertificationRequest $request)
    {
        TypeCertification::create($request->all());
        Session::flash('success', 'El registro fue almacenado satisfactoriamente.');
        return redirect()->route('maintainers.type-certifications.index');
    }

    public function edit($id)
    {
        $type_certification = TypeCertification::findOrFail($id);
        return view('maintainers.type-certifications.edit', compact('type_certification'));
    }

    public function update(TypeCertificationRequest $request, $id)
    {
        $type_certification = TypeCertification::findOrFail($id);
        $message = 'El registro ' . $type_certification->name . ' fue actualizado satisfactoriamente.';
        $type_certification->fill($request->all());
        $type_certification->save();
        Session::flash('success', $message);
        return redirect()->route('maintainers.type-certifications.index');
    }

    public function destroy($id)
    {
        $type_certification = TypeCertification::findOrFail($id);
        $type_certification->delete();
        Session::flash('success', 'El registro ' . $type_certification->name . ' fue eliminado satisfactoriamente.');
        return redirect()->route('maintainers.type-certifications.index');
    }
}
