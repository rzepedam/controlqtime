<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use App\Disease;
use App\Http\Requests\DiseaseRequest;

class DiseaseController extends Controller
{
    public function index(Request $request)
    {
        $diseases = Disease::name($request->get('table_search'))->orderBy('name')->paginate(20);
        return view('maintainers.diseases.index', compact('diseases'));
    }

    public function create()
    {
        return view('maintainers.diseases.create');
    }

    public function store(DiseaseRequest $request)
    {
        Disease::create($request->all());
        Session::flash('success', 'El registro fue almacenado satisfactoriamente.');
        return redirect()->route('maintainers.diseases.index');
    }

    public function show($id)
    {
        $disease = Disease::findOrFail($id);
        return view('maintainers.diseases.show', compact('disease'));
    }

    public function edit($id)
    {
        $disease = Disease::findOrFail($id);
        return view('maintainers.diseases.edit', compact('disease'));
    }

    public function update(DiseaseRequest $request, $id)
    {
        $disease = Disease::findOrFail($id);
        $message = 'El registro ' . $disease->name . ' fue actualizado satisfactoriamente.';
        $disease->fill($request->all());
        $disease->save();
        Session::flash('success', $message);
        return redirect()->route('maintainers.diseases.index');
    }

    public function destroy($id)
    {
        $disease = Disease::findOrFail($id);
        $disease->delete();
        Session::flash('success', 'El registro ' . $disease->name . ' fue eliminado satisfactoriamente.');
        return redirect()->route('maintainers.diseases.index');
    }
}
