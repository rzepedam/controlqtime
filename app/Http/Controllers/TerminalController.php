<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Core\Contracts\TerminalRepoInterface;
use Controlqtime\Http\Requests\TerminalRequest;
use Controlqtime\Http\Requests;

class TerminalController extends Controller
{
    protected $terminal;

    public function __construct(TerminalRepoInterface $terminal)
    {
        $this->terminal = $terminal;
    }
    public function index()
    {
        return view('maintainers.terminals.index');
    }

    public function getTerminals()
    {
        $terminals = $this->terminal->all();
        return $terminals;
    }

    public function create()
    {
        return view('maintainers.terminals.create');
    }

    public function store(TerminalRequest $request)
    {
        $this->terminal->create($request->all());
        return redirect()->route('maintainers.terminals.index');
    }

    public function edit($id)
    {
        $terminal = $this->terminal->find($id);
        return view('maintainers.terminals.edit', compact('terminal'));
    }

    public function update(TerminalRequest $request, $id)
    {
        $this->terminal->update($request->all(), $id);
        return redirect()->route('maintainers.terminals.index');
    }

    public function destroy($id)
    {
        $this->terminal->delete($id);
        return redirect()->route('maintainers.terminals.index');
    }
}
