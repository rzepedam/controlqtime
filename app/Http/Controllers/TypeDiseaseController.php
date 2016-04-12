<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use App\TypeDisease;
use App\Http\Requests\TypeDiseaseRequest;

class TypeDiseaseController extends Controller
{
    public function index(Request $request)
    {
        $type_diseases = TypeDisease::name($request->get('table_search'))->orderBy('name')->paginate(20);
        return view('maintainers.type-diseases.index', compact('type_diseases'));
    }

    public function create()
    {
        return view('maintainers.type-diseases.create');
    }

    public function store(TypeDiseaseRequest $request)
    {
        TypeDisease::create($request->all());
        Session::flash('success', 'El registro fue almacenado satisfactoriamente.');
        return redirect()->route('maintainers.type-diseases.index');
    }

    public function show($id)
    {
        $type_disease = TypeDisease::findOrFail($id);
        return view('maintainers.type-diseases.show', compact('type_disease'));
    }

    public function edit($id)
    {
        $type_disease = TypeDisease::findOrFail($id);
        return view('maintainers.type-diseases.edit', compact('type_disease'));
    }

    public function update(TypeDiseaseRequest $request, $id)
    {
        $type_disease = TypeDisease::findOrFail($id);
        $message = 'El registro ' . $type_disease->name . ' fue actualizado satisfactoriamente.';
        $type_disease->fill($request->all());
        $type_disease->save();
        Session::flash('success', $message);
        return redirect()->route('maintainers.type-diseases.index');
    }

    public function destroy($id)
    {
        $type_disease = TypeDisease::findOrFail($id);
        $type_disease->delete();
        Session::flash('success', 'El registro ' . $type_disease->name . ' fue eliminado satisfactoriamente.');
        return redirect()->route('maintainers.type-diseases.index');
    }
}
