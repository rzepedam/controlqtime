<?php

namespace Controlqtime\Http\Controllers;

use Illuminate\Http\Request;
use Controlqtime\Http\Requests;
use Illuminate\Support\Facades\Session;
use Controlqtime\Http\Requests\ProfessionRequest;
use Controlqtime\Core\Contracts\ProfessionRepoInterface;


class ProfessionController extends Controller
{
    protected $profession;
    
    public function __construct(ProfessionRepoInterface $profession)
    {
        $this->profession = $profession;
    }

    public function index(Request $request)
    {
        $professions = $this->profession->all($request);
        return view('maintainers.professions.index', compact('professions'));
    }

    public function create()
    {
        return view('maintainers.professions.create');
    }

    public function store(ProfessionRequest $request)
    {
        Profession::create($request->all());
        Session::flash('success', 'El registro fue almacenado satisfactoriamente.');
        return redirect()->route('maintainers.professions.index');
    }

    public function edit($id)
    {
        $profession = $this->profession->findOrFail($id);
        return view('maintainers.professions.edit', compact('profession'));
    }

    public function update(ProfessionRequest $request, $id)
    {
        $profession = Profession::findOrFail($id);
        $message = 'El registro ' . $profession->name . ' fue actualizado satisfactoriamente.';
        $profession->fill($request->all());
        $profession->save();
        Session::flash('success', $message);
        return redirect()->route('maintainers.professions.index');
    }

    public function destroy($id)
    {
        $profession = Profession::findOrFail($id);
        $profession->delete();
        Session::flash('success', 'El registro ' . $profession->name . ' fue eliminado satisfactoriamente.');
        return redirect()->route('maintainers.professions.index');
    }
}
