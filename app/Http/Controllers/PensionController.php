<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

use App\Pension;
use App\Http\Requests\PensionRequest;

class PensionController extends Controller
{
    public function index(Request $request)
    {
        $pensions = Pension::name($request->get('table_search'))->orderBy('name')->paginate(20);
        return view('maintainers.pensions.index', compact('pensions'));
    }

    public function create()
    {
        return view('maintainers.pensions.create');
    }

    public function store(PensionRequest $request)
    {
        Pension::create($request->all());
        Session::flash('success', 'El registro fue almacenado satisfactoriamente.');
        return redirect()->route('maintainers.pensions.index');
    }

    public function edit($id)
    {
        $pension = Pension::findOrFail($id);
        return view('maintainers.pensions.edit', compact('pension'));
    }

    public function update(PensionRequest $request, $id)
    {
        $pension = Pension::findOrFail($id);
        $message = 'El registro ' . $pension->name . ' fue actualizado satisfactoriamente.';
        $pension->fill($request->all());
        $pension->save();
        Session::flash('success', $message);
        return redirect()->route('maintainers.pensions.index');
    }

    public function destroy($id)
    {
        $pension = Pension::findOrFail($id);
        $pension->delete();
        Session::flash('success', 'El registro ' . $pension->name . ' fue eliminado satisfactoriamente.');
        return redirect()->route('maintainers.pensions.index');
    }
}
