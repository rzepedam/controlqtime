<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use App\Certification;
use App\Institution;
use App\Http\Requests\CertificationRequest;

class CertificationController extends Controller
{
    public function index(Request $request)
    {
        $certifications = Certification::name($request->get('table_search'))->orderBy('name')->paginate(20);
        return view('maintainers.certifications.index', compact('certifications'));
    }

    public function create()
    {
        return view('maintainers.certifications.create');
    }

    public function store(CertificationRequest $request)
    {
        Certification::create($request->all());
        Session::flash('success', 'El registro fue almacenado satisfactoriamente.');
        return redirect()->route('maintainers.certifications.index');
    }

    public function edit($id)
    {
        $certification = Certification::findOrFail($id);
        return view('maintainers.certifications.edit', compact('certification'));
    }

    public function update(CertificationRequest $request, $id)
    {
        $certification = Certification::findOrFail($id);
        $message = 'El registro ' . $certification->name . ' fue actualizado satisfactoriamente.';
        $certification->fill($request->all());
        $certification->save();
        Session::flash('success', $message);
        return redirect()->route('maintainers.certifications.index');
    }

    public function destroy($id)
    {
        $certification = Certification::findOrFail($id);
        $certification->delete();
        Session::flash('success', 'El registro ' . $certification->name . ' fue eliminado satisfactoriamente.');
        return redirect()->route('maintainers.certifications.index');
    }
}
