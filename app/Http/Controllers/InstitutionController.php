<?php

namespace Controlqtime\Http\Controllers;

use Illuminate\Http\Request;
use Controlqtime\Http\Requests;
use Controlqtime\Http\Controllers\Controller;
use Controlqtime\Institution;
use Controlqtime\TypeInstitution;
use Controlqtime\Http\Requests\InstitutionRequest;
use Illuminate\Support\Facades\Session;

class InstitutionController extends Controller
{
    public function index(Request $request)
    {
        $institutions = Institution::name($request->get('table_search'))->orderBy('name')->paginate(20);
        return view('maintainers.institutions.index', compact('institutions'));
    }

    public function create()
    {
        $type_institutions = TypeInstitution::orderBy('name')->lists('name', 'id');
        return view('maintainers.institutions.create', compact('type_institutions'));
    }

    public function store(InstitutionRequest $request)
    {
        Institution::create($request->all());
        Session::flash('success', 'El registro fue almacenado satisfactoriamente.');
        return redirect()->route('maintainers.institutions.index');
    }

    public function edit($id)
    {
        $institution = Institution::findOrFail($id);
        $type_institutions = TypeInstitution::orderBy('name')->lists('name', 'id');
        return view('maintainers.institutions.edit', compact('institution', 'type_institutions'));
    }

    public function update(InstitutionRequest $request, $id)
    {
        $institution = Institution::findOrFail($id);
        $message = 'El registro ' . $institution->name . ' fue actualizado satisfactoriamente.';
        $institution->fill($request->all());
        $institution->save();
        Session::flash('success', $message);
        return redirect()->route('maintainers.institutions.index');
    }

    public function destroy($id)
    {
        $institution = Institution::findOrFail($id);
        $institution->delete();
        Session::flash('success', 'El registro ' . $institution->name . ' fue eliminado satisfactoriamente.');
        return redirect()->route('maintainers.institutions.index');
    }
}
