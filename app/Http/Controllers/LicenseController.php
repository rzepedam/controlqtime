<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use App\License;
use App\Http\Requests\LicenseRequest;


class LicenseController extends Controller
{
    public function index(Request $request)
    {
        $licenses = License::name($request->get('table_search'))->orderBy('name')->paginate(20);
        return view('maintainers.licenses.index', compact('licenses'));
    }

    public function create()
    {
        return view('maintainers.licenses.create');
    }

    public function store(LicenseRequest $request)
    {
        License::create($request->all());
        Session::flash('success', 'El registro fue almacenado satisfactoriamente');
        return redirect()->route('maintainers.licenses.index');
    }

    public function edit($id)
    {
        $license = License::findOrFail($id);
        return view('maintainers.licenses.edit', compact('license'));
    }

    public function update(LicenseRequest $request, $id)
    {
        $license = License::findOrFail($id);
        $message = $license->name . ' fue actualizado satisfactoriamente';
        $license->fill($request->all());
        $license->save();
        Session::flash('success', $message);
        return redirect()->route('maintainers.licenses.index');
    }

    public function destroy($id)
    {
        $license = License::findOrFail($id);
        $license->delete();
        Session::flash('success', $license->name . ' fue eliminado de nuestros registros');
        return redirect()->route('maintainers.licenses.index');
    }
}
