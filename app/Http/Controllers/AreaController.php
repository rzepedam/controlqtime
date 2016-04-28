<?php

namespace App\Http\Controllers;

use App\Terminal;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

use App\Area;
use App\Http\Requests\AreaRequest;

class AreaController extends Controller
{
	public function index(Request $request)
    {
        $areas = Area::name($request->get('table_search'))->orderBy('id', 'DESC')->paginate(20);
        return view('maintainers.areas.index', compact('areas'));
    }

    public function create()
    {
        $terminals = Terminal::lists('name', 'id');
        return view('maintainers.areas.create', compact('terminals'));
    }

    public function store(AreaRequest $request)
    {
        Area::create($request->all());
        Session::flash('success', 'El registro fue almacenado satisfactoriamente.');
        return redirect()->route('maintainers.areas.index');
    }

    public function edit($id)
    {
        $area       = Area::findOrFail($id);
        $terminals  = Terminal::lists('name', 'id');
        return view('maintainers.areas.edit', compact('area', 'terminals'));
    }

    public function update(AreaRequest $request, $id)
    {
        $area = Area::findOrFail($id);
        $message = 'El registro ' . $area->name . ' fue actualizado satisfactoriamente.';
        $area->fill($request->all());
        $area->save();
        Session::flash('success', $message);
        return redirect()->route('maintainers.areas.index');
    }

    public function destroy($id)
    {
        $area = Area::findOrFail($id);
        $area->delete();
        Session::flash('success', 'El registro ' . $area->name . ' fue eliminado satisfactoriamente.');
        return redirect()->route('maintainers.areas.index');
    }
}
