<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Core\Contracts\BaseRepoInterface;
use Controlqtime\Http\Requests;
use Controlqtime\Http\Requests\TypeDiseaseRequest;

class TypeDiseaseController extends Controller
{
    private $type_disease;

    public function __construct(BaseRepoInterface $type_disease)
    {
        $this->type_disease = $type_disease;
    }

    public function index()
    {
        $type_diseases = $this->type_disease->all();
        return view('maintainers.type-diseases.index', compact('type_diseases'));
    }

    public function create()
    {
        return view('maintainers.type-diseases.create');
    }

    public function store(TypeDiseaseRequest $request)
    {
        $this->type_disease->create($request->all());
        return redirect()->route('maintainers.type-diseases.index');
    }

    public function show($id)
    {
        $type_disease = $this->type_disease->find($id);
        return view('maintainers.type-diseases.show', compact('type_disease'));
    }

    public function edit($id)
    {
        $type_disease = $this->type_disease->find($id);
        return view('maintainers.type-diseases.edit', compact('type_disease'));
    }

    public function update(TypeDiseaseRequest $request, $id)
    {
        $this->type_disease->update($request->all(), $id);
        return redirect()->route('maintainers.type-diseases.index');
    }

    public function destroy($id)
    {
        $this->type_disease->delete($id);
        return redirect()->route('maintainers.type-diseases.index');
    }
}
