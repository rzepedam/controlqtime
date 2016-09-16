<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Http\Requests\TypeExamRequest;
use Controlqtime\Core\Contracts\TypeExamRepoInterface;

class TypeExamController extends Controller
{
    /**
     * @var TypeExamRepoInterface
     */
    protected $type_exam;

    /**
     * TypeExamController constructor.
     * @param TypeExamRepoInterface $type_exam
     */
    public function __construct(TypeExamRepoInterface $type_exam)
    {
        $this->type_exam = $type_exam;
    }

    /**
     * @return mixed for Bootstrap-Table
     */
    public function getTypeExams()
    {
        $type_exams = $this->type_exam->all();

        return $type_exams;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('maintainers.type-exams.index');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('maintainers.type-exams.create');
    }

    /**
     * @param TypeExamRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(TypeExamRequest $request)
    {
        $this->type_exam->create($request->all());

        return response()->json([
            'success' => true,
            'url'     => '/maintainers/type-exams'
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $type_exam = $this->type_exam->find($id);

        return view('maintainers.type-exams.edit', compact('type_exam'));
    }

    /**
     * @param TypeExamRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(TypeExamRequest $request, $id)
    {
        $this->type_exam->update($request->all(), $id);

        return response()->json([
            'success' => true,
            'url'     => '/maintainers/type-exams'
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $this->type_exam->delete($id);

        return redirect()->route('type-exams.index');
    }
}
