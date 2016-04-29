<?php

namespace Controlqtime\Http\Controllers;

use Illuminate\Http\Request;
use Controlqtime\Http\Requests;
use Illuminate\Support\Facades\Session;
use Controlqtime\TypeSpeciality;
use Controlqtime\Http\Requests\TypeSpecialityRequest;


class TypeSpecialityController extends Controller
{
    public function index(Request $request)
    {
        $type_specialities = TypeSpeciality::name($request->get('table_search'))->orderBy('name')->paginate(20);
        return view('maintainers.type-specialities.index', compact('type_specialities'));
    }

    public function create()
    {
        return view('maintainers.type-specialities.create');
    }

    public function store(TypeSpecialityRequest $request)
    {
        TypeSpeciality::create($request->all());
        Session::flash('success', 'El registro fue almacenado satisfactoriamente.');
        return redirect()->route('maintainers.type-specialities.index');
    }

    public function edit($id)
    {
        $type_speciality = TypeSpeciality::findOrFail($id);
        return view('maintainers.type-specialities.edit', compact('type_speciality'));
    }

    public function update(TypeSpecialityRequest $request, $id)
    {
        $type_speciality = TypeSpeciality::findOrFail($id);
        $message = 'El registro ' . $type_speciality->name . ' fue actualizado satisfactoriamente.';
        $type_speciality->fill($request->all());
        $type_speciality->save();
        Session::flash('success', $message);
        return redirect()->route('maintainers.type-specialities.index');
    }

    public function destroy($id)
    {
        $type_speciality = TypeSpeciality::findOrFail($id);
        $type_speciality->delete();
        Session::flash('success', 'El registro ' . $type_speciality->name . ' fue eliminado de nuestros registros.');
        return redirect()->route('maintainers.type-specialities.index');
    }
}
