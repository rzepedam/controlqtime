<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Core\Contracts\TypeRepresentativeRepoInterface;
use Controlqtime\Http\Requests\TypeRepresentativeRequest;

use Controlqtime\Http\Requests;

class TypeRepresentativeController extends Controller
{
    protected $type_representative;

    public function __construct(TypeRepresentativeRepoInterface $type_representative)
    {
        $this->type_representative = $type_representative;
    }

    public function index()
    {
        return view('maintainers.type-representatives.index');
    }

    public function getTypeRepresentatives()
    {
        $type_representatives = $this->type_representative->all();
        return $type_representatives;
    }

    public function create()
    {
        return view('maintainers.type-representatives.create');
    }

    public function store(TypeRepresentativeRequest $request)
    {
        $this->type_representative->create($request->all());
        return redirect()->route('maintainers.type-representatives.index');
    }

    public function edit($id)
    {
        $type_representative = $this->type_representative->find($id);
        return view('maintainers.type-representatives.edit', compact('type_representative'));
    }

    public function update(TypeRepresentativeRequest $request, $id)
    {
        $this->type_representative->update($request->all(), $id);
        return redirect()->route('maintainers.type-representatives.index');
    }

    public function destroy($id)
    {
        $this->type_representative->delete($id);
        return redirect()->route('maintainers.type-representatives.index');
    }
}
