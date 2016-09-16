<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Http\Requests\TypeDiseaseRequest;
use Controlqtime\Core\Contracts\TypeDiseaseRepoInterface;

class TypeDiseaseController extends Controller
{
    /**
     * @var TypeDiseaseRepoInterface
     */
    protected $type_disease;

    /**
     * TypeDiseaseController constructor.
     * @param TypeDiseaseRepoInterface $type_disease
     */
    public function __construct(TypeDiseaseRepoInterface $type_disease)
    {
        $this->type_disease = $type_disease;
    }

    /**
     * @return mixed for Bootstrap-Table
     */
    public function getTypeDiseases()
    {
        $type_diseases = $this->type_disease->all();

        return $type_diseases;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('maintainers.type-diseases.index');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('maintainers.type-diseases.create');
    }

    /**
     * @param TypeDiseaseRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(TypeDiseaseRequest $request)
    {
        $this->type_disease->create($request->all());

        return response()->json([
            'success' => true,
            'url'     => '/maintainers/type-diseases'
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $type_disease = $this->type_disease->find($id);

        return view('maintainers.type-diseases.show', compact('type_disease'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $type_disease = $this->type_disease->find($id);

        return view('maintainers.type-diseases.edit', compact('type_disease'));
    }

    /**
     * @param TypeDiseaseRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(TypeDiseaseRequest $request, $id)
    {
        $this->type_disease->update($request->all(), $id);

        return response()->json([
            'success' => true,
            'url'     => '/maintainers/type-diseases'
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $this->type_disease->delete($id);

        return redirect()->route('type-diseases.index');
    }
}
