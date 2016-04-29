<?php

namespace Controlqtime\Http\Controllers;

use Illuminate\Http\Request;
use Controlqtime\Http\Requests;
use Illuminate\Support\Facades\Session;
use Controlqtime\TypeInstitution;
use Controlqtime\Http\Requests\TypeInstitutionRequest;

class TypeInstitutionController extends Controller
{
    public function index(Request $request)
    {
        $type_institutions = TypeInstitution::name($request->get('table_search'))->orderBy('name')->paginate(20);
        return view('maintainers.type-institutions.index', compact('type_institutions'));
    }

    public function create()
    {
        return view('maintainers.type-institutions.create');
    }

    public function store(TypeInstitutionRequest $request)
    {
        TypeInstitution::create($request->all());
        Session::flash('success', 'El registro fue almacenado satisfactoriamente.');
        return redirect()->route('maintainers.type-institutions.index');
    }

    public function edit($id)
    {
        $type_institution = TypeInstitution::findOrFail($id);
        return view('maintainers.type-institutions.edit', compact('type_institution'));
    }

    public function update($id, TypeInstitutionRequest $request)
    {
        $type_institution = TypeInstitution::findOrFail($id);
        $message = 'El registro ' . $type_institution->name . ' fue actualizado satisfactoriamente.';
        $type_institution->fill($request->all());
        $type_institution->save();
        Session::flash('success', $message);
        return redirect()->route('maintainers.type-institutions.index');
    }

    public function destroy($id)
    {
        $type_institution = TypeInstitution::findOrFail($id);
        $type_institution->delete();
        Session::flash('success', 'El registro ' . $type_institution->name . ' fue eliminado satisfactoriamente.');
        return redirect()->route('maintainers.type-institutions.index');
    }
}
