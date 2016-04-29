<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Http\Requests\TrademarkRequest;
use Controlqtime\Trademark;
use Illuminate\Http\Request;

use Controlqtime\Http\Requests;
use Illuminate\Support\Facades\Session;

class TrademarkController extends Controller
{
    public function index(Request $request)
    {
        $trademarks = Trademark::name($request->get('table_search'))->orderBy('name')->paginate(20);
        return view('maintainers.trademarks.index', compact('trademarks'));
    }

    public function create()
    {
        return view('maintainers.trademarks.create');
    }

    public function store(TrademarkRequest $request)
    {
        Trademark::create($request->all());
        Session::flash('success', 'El registro fue almacenado satisfactoriamente.');
        return redirect()->route('maintainers.trademarks.index');
    }

    public function edit($id)
    {
        $trademark = Trademark::findOrFail($id);
        return view('maintainers.trademarks.edit', compact('trademark'));
    }

    public function update(TrademarkRequest $request, $id)
    {
        $trademark = Trademark::findOrFail($id);
        $message = 'El registro ' . $trademark->name . ' fue actualizado satisfactoriamente.';
        $trademark->fill($request->all());
        $trademark->save();
        Session::flash('success', $message);
        return redirect()->route('maintainers.trademarks.index');
    }

    public function destroy($id)
    {
        $trademark = Trademark::findOrFail($id);
        $trademark->delete();
        Session::flash('success', 'El registro ' . $trademark->name . ' fue eliminado satisfactoriamente.');
        return redirect()->route('maintainers.trademarks.index');
    }
}
