<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

use App\Degree;
use App\Http\Requests\DegreeRequest;

class DegreeController extends Controller
{
	public function index(Request $request)
    {
        $degrees = Degree::name($request->get('table_search'))->orderBy('name')->paginate(20);
        return view('maintainers.degrees.index', compact('degrees'));
    }

    public function create()
    {
        return view('maintainers.degrees.create');
    }

    public function store(DegreeRequest $request)
    {
        Degree::create($request->all());
        Session::flash('success', 'El registro fue almacenado satisfactoriamente.');
        return redirect()->route('maintainers.degrees.index');
    }

    public function edit($id)
    {
        $degree = Degree::findOrFail($id);
        return view('maintainers.degrees.edit', compact('degree'));
    }

    public function update(DegreeRequest $request, $id)
    {
        $degree = Degree::findOrFail($id);
        $message = 'El registro ' . $degree->name . ' fue actualizado satisfactoriamente.';
        $degree->fill($request->all());
        $degree->save();
        Session::flash('success', $message);
        return redirect()->route('maintainers.degrees.index');
    }

    public function destroy($id)
    {
        $degree = Degree::findOrFail($id);
        $degree->delete();
        Session::flash('success', 'El registro ' . $degree->name . ' fue eliminado satisfactoriamente.');
        return redirect()->route('maintainers.degrees.index');
    }
}
