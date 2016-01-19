<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Kin;
use App\Http\Requests\KinRequest;

class KinController extends Controller
{
    public function index(Request $request)
    {
        $kins = Kin::name($request->get('table_search'))->orderBy('name')->paginate(20);
        return view('maintainers.kins.index', compact('kins'));
    }

    public function create()
    {
        return view('maintainers.kins.create');
    }

    public function store(KinRequest $request)
    {
        Kin::create($request->all());
        Session::flash('success', 'El registro fue almacenado satisfactoriamente');
        return redirect()->route('maintainers.kins.index');
    }

    public function edit($id)
    {
        $kin = Kin::findOrFail($id);
        return view('maintainers.kins.edit', compact('kin'));
    }

    public function update(KinRequest $request, $id)
    {
        $kin = Kin::findOrFail($id);
        $message = $kin->name . ' fue actualizado satisfactoriamente';
        $kin->fill($request->all());
        $kin->save();
        Session::flash('success', $message);
        return redirect()->route('maintainers.kins.index');
    }

    public function destroy($id)
    {
        $kin = Kin::findOrFail($id);
        $kin->delete();
        Session::flash('success', $kin->name . ' fue eliminado de nuestros registros');
        return redirect()->route('maintainers.kins.index');
    }
}
