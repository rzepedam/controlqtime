<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Session;
use App\Profession;
use App\Http\Requests\ProfessionRequest;


class ProfessionController extends Controller
{
    public function index(Request $request)
    {
        $professions = Profession::name($request->get('table_search'))->orderBy('name')->paginate(20);
        return view('maintainers.professions.index', compact('professions'));
    }

    public function create()
    {
        return view('maintainers.professions.create');
    }

    public function store(ProfessionRequest $request)
    {
        Profession::create($request->all());
        Session::flash('success', 'El registro fue almacenado satisfactoriamente.');
        return redirect()->route('maintainers.professions.index');
    }

    public function edit($id)
    {
        $profession = Profession::findOrFail($id);
        return view('maintainers.professions.edit', compact('profession'));
    }

    public function update(ProfessionRequest $request, $id)
    {
        $profession = Profession::findOrFail($id);
        $message = 'El registro ' . $profession->name . ' fue actualizado satisfactoriamente.';
        $profession->fill($request->all());
        $profession->save();
        Session::flash('success', $message);
        return redirect()->route('maintainers.professions.index');
    }

    public function destroy($id)
    {
        $profession = Profession::findOrFail($id);
        $profession->delete();
        Session::flash('success', 'El registro ' . $profession->name . ' fue eliminado satisfactoriamente.');
        return redirect()->route('maintainers.professions.index');
    }
}
