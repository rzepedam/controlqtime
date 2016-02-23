<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

use App\Mutuality;
use App\Http\Requests\MutualityRequest;

class MutualityController extends Controller
{
    public function index(Request $request)
    {
    	$mutualities = Mutuality::name($request->get('table_search'))->orderBy('name')->paginate(20);
    	return view('maintainers.mutualities.index', compact('mutualities'));
    }

    public function create()
    {
    	return view('maintainers.mutualities.create');
    }

    public function store(MutualityRequest $request)
    {
    	Mutuality::create($request->all());
        Session::flash('success', 'El registro fue almacenado satisfactoriamente');
        return redirect()->route('maintainers.mutualities.index');
    }

    public function edit($id)
    {
        $mutuality = Mutuality::findOrFail($id);
        return view('maintainers.mutualities.edit', compact('mutuality'));
    }

    public function update(MutualityRequest $request, $id)
    {
        $mutuality = Mutuality::findOrFail($id);
        $message = $mutuality->name . ' fue actualizado satisfactoriamente';
        $mutuality->fill($request->all());
        $mutuality->save();
        Session::flash('success', $message);
        return redirect()->route('maintainers.mutualities.index');
    }

    public function destroy($id)
    {
        $mutuality = Mutuality::findOrFail($id);
        $mutuality->delete();
        Session::flash('success', $mutuality->name . ' fue eliminado de nuestros registros');
        return redirect()->route('maintainers.mutualities.index');
    }
}
