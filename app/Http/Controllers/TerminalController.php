<?php

namespace App\Http\Controllers;

use App\Http\Requests\TerminalRequest;
use App\Terminal;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class TerminalController extends Controller
{
    public function index(Request $request)
    {
        $terminals = Terminal::name($request->get('table_search'))->orderBy('id', 'name')->paginate(20);
        return view('maintainers.terminals.index', compact('terminals'));
    }

    public function create()
    {
        return view('maintainers.terminals.create');
    }

    public function store(TerminalRequest $request)
    {
        Terminal::create($request->all());
        Session::flash('success', 'El registro fue almacenado satisfactoriamente.');
        return redirect()->route('maintainers.terminals.index');
    }

    public function edit($id)
    {
        $terminal = Terminal::findOrFail($id);
        return view('maintainers.terminals.edit', compact('terminal'));
    }

    public function update(TerminalRequest $request, $id)
    {
        $terminal = Terminal::findOrFail($id);
        $message = 'El registro ' . $terminal->name . ' fue actualizado satisfactoriamente.';
        $terminal->fill($request->all());
        $terminal->save();
        Session::flash('success', $message);
        return redirect()->route('maintainers.terminals.index');
    }

    public function destroy($id)
    {
        $terminal = Terminal::findOrFail($id);
        $terminal->delete();
        Session::flash('success', 'El registro ' . $terminal->name . ' fue eliminado satisfactoriamente.');
        return redirect()->route('maintainers.terminals.index');
    }
}
