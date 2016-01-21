<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use App\Disability;
use App\Http\Requests\DisabilityRequest;


class DisabilityController extends Controller
{
    public function index(Request $request)
    {
        $disabilities = Disability::name($request->get('table_search'))->orderBy('name')->paginate(20);
        return view('maintainers.disabilities.index', compact('disabilities'));
    }

    public function create()
    {
        return view('maintainers.disabilities.create');
    }

    public function store(DisabilityRequest $request)
    {
        Disability::create($request->all());
        Session::flash('message', 'El registro fue almacenado satisfactoriamente');
        return redirect()->route('maintainers.disabilities.index');
    }

    public function show($id)
    {
        $disability = Disability::findOrFail($id);
        return view('maintainers.disabilities.show', compact('disability'));
    }

    public function edit($id)
    {
        $disability = Disability::findOrFail($id);
        return view('maintainers.disabilities.edit', compact('disability'));
    }

    public function update(DisabilityRequest $request, $id)
    {
        $disability = Disability::findOrFail($id);
        $message = $disability->name . ' fue actualizado satisfactoriamente';
        $disability->fill($request->all());
        $disability->save();
        Session::flash('success', $message);
        return redirect()->route('maintainers.disabilities.index');
    }

    public function destroy($id)
    {
        $disability = Disability::findOrFail($id);
        $disability->delete();
        Session::flash('success', $disability->name . ' fue eliminado de nuestros registros');
        return redirect()->route('maintainers.disabilities.index');
    }
}
