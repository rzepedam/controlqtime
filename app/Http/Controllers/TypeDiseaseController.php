<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Core\Contracts\TypeDiseaseRepoInterface;
use Controlqtime\Http\Requests;
use Controlqtime\Http\Requests\TypeDiseaseRequest;

class TypeDiseaseController extends Controller
{
    private $type_disease;

    public function __construct(TypeDiseaseRepoInterface $type_disease)
    {
        $this->type_disease = $type_disease;
    }

    public function index()
    {
        return view('maintainers.type-diseases.index');
    }

    public function getTypeDiseases() {
        $type_diseases = $this->type_disease->all();
        return $type_diseases;
    }

    public function create()
    {
        return view('maintainers.type-diseases.create');
    }

    public function store(TypeDiseaseRequest $request)
    {
        $this->type_disease->create($request->all());

		return response()->json(array(
			'success' => true,
			'url'     => '/maintainers/type-diseases'
		));
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

		return response()->json(array(
			'success' => true,
			'url'     => '/maintainers/type-diseases'
		));
    }

    public function destroy($id)
    {
        $this->type_disease->delete($id);
        return redirect()->route('type-diseases.index');
    }
}
