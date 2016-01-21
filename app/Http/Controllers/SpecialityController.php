<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use App\Speciality;
use App\Institution;
use App\Http\Requests\SpecialityRequest;


class SpecialityController extends Controller
{
    public function index(Request $request)
    {
        $specialities = Speciality::name($request->get('table_search'))->orderBy('name')->paginate(20);
        return view('maintainers.specialities.index', compact('specialities'));
    }

    public function create()
    {
        return view('maintainers.specialities.create');
    }

    public function store(SpecialityRequest $request)
    {
        Speciality::create($request->all());
        Session::flash('success', 'El registro fue almacenado satisfactoriamente');
        return redirect()->route('maintainers.specialities.index');
    }

    public function edit($id)
    {
        $speciality = Speciality::findOrFail($id);
        return view('maintainers.specialities.edit', compact('speciality'));
    }

    public function update(SpecialityRequest $request, $id)
    {
        $speciality = Speciality::findOrFail($id);
        $message = $speciality->name . ' fue actualizado satisfactoriamente';
        $speciality->fill($request->all());
        $speciality->save();
        Session::flash('success', $message);
        return redirect()->route('maintainers.specialities.index');
    }

    public function destroy($id)
    {
        $speciality = Speciality::findOrFail($id);
        $speciality->delete();
        Session::flash('success', $speciality->name . ' fue eliminado de nuestros registros');
        return redirect()->route('maintainers.specialities.index');
    }
}
