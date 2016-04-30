<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Core\Contracts\BaseRepoInterface;
use Controlqtime\Http\Requests;
use Illuminate\Support\Facades\Session;
use Controlqtime\Http\Requests\TypeDisabilityRequest;

class TypeDisabilityController extends Controller
{
    private $type_disability;

    public function __construct(BaseRepoInterface $type_disability)
    {
        $this->type_disability = $type_disability;
    }

    public function index()
    {
        $type_disabilities = $this->type_disability->all();
        return view('maintainers.type-disabilities.index', compact('type_disabilities'));
    }

    public function create()
    {
        return view('maintainers.type-disabilities.create');
    }

    public function store(TypeDisabilityRequest $request)
    {
        $this->type_disability->create($request->all());
        Session::flash('message', 'El registro fue almacenado satisfactoriamente.');
        return redirect()->route('maintainers.type-disabilities.index');
    }

    public function edit($id)
    {
        $type_disability = $this->type_disability->find($id);
        return view('maintainers.type-disabilities.edit', compact('type_disability'));
    }

    public function update(TypeDisabilityRequest $request, $id)
    {
        $this->type_disability->update($request->all(), $id);
        Session::flash('success', 'El registro fue actualizado satisfactoriamente.');
        return redirect()->route('maintainers.type-disabilities.index');
    }

    public function destroy($id)
    {
        $this->type_disability->delete($id);
        Session::flash('success', 'El registro fue eliminado satisfactoriamente.');
        return redirect()->route('maintainers.type-disabilities.index');
    }
}
