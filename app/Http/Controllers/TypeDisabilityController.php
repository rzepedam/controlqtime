<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\TypeDisability;
use Illuminate\Http\Request;
use Controlqtime\Http\Requests;
use Illuminate\Support\Facades\Session;
use Controlqtime\Http\Requests\TypeDisabilityRequest;


class TypeDisabilityController extends Controller
{
    public function index(Request $request)
    {

        $type_disabilities = TypeDisability::name($request->get('table_search'))->orderBy('name')->paginate(20);
        return view('maintainers.type-disabilities.index', compact('type_disabilities'));
    }

    public function create()
    {
        return view('maintainers.type-disabilities.create');
    }

    public function store(TypeDisabilityRequest $request)
    {
        TypeDisability::create($request->all());
        Session::flash('message', 'El registro fue almacenado satisfactoriamente.');
        return redirect()->route('maintainers.type-disabilities.index');
    }

    public function show($id)
    {
        $type_disability = TypeDisability::findOrFail($id);
        return view('maintainers.type-disabilities.show', compact('type_disability'));
    }

    public function edit($id)
    {
        $type_disability = TypeDisability::findOrFail($id);
        return view('maintainers.type-disabilities.edit', compact('type_disability'));
    }

    public function update(TypeDisabilityRequest $request, $id)
    {
        $type_disability = TypeDisability::findOrFail($id);
        $message = 'El registro ' . $type_disability->name . ' fue actualizado satisfactoriamente.';
        $type_disability->fill($request->all());
        $type_disability->save();
        Session::flash('success', $message);
        return redirect()->route('maintainers.type-disabilities.index');
    }

    public function destroy($id)
    {
        $type_disability = TypeDisability::findOrFail($id);
        $type_disability->delete();
        Session::flash('success', 'El registro ' . $type_disability->name . ' fue eliminado satisfactoriamente.');
        return redirect()->route('maintainers.type-disabilities.index');
    }
}
