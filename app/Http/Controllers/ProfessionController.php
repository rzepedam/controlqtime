<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Core\Contracts\ProfessionRepoInterface;
use Controlqtime\Http\Requests;
use Controlqtime\Http\Requests\ProfessionRequest;

class ProfessionController extends Controller
{
    protected $profession;
    
    public function __construct(ProfessionRepoInterface $profession)
    {
        $this->profession = $profession;
    }

    public function index()
    {
        $professions = $this->profession->all();
        return view('maintainers.professions.index', compact('professions'));
    }

    public function create()
    {
        return view('maintainers.professions.create');
    }

    public function store(ProfessionRequest $request)
    {
        $this->profession->create($request->all());
        return redirect()->route('maintainers.professions.index');
    }

    public function edit($id)
    {
        $profession = $this->profession->find($id);
        return view('maintainers.professions.edit', compact('profession'));
    }

    public function update(ProfessionRequest $request, $id)
    {
        $this->profession->update($request->all(), $id);
        return redirect()->route('maintainers.professions.index');
    }

    public function destroy($id)
    {
        $this->profession->delete($id);
        return redirect()->route('maintainers.professions.index');
    }
}
