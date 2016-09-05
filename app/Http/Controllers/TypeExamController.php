<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Core\Contracts\TypeExamRepoInterface;
use Controlqtime\Http\Requests;
use Controlqtime\Http\Requests\TypeExamRequest;

class TypeExamController extends Controller
{
    protected $type_exam;

    public function __construct(TypeExamRepoInterface $type_exam)
    {
        $this->type_exam = $type_exam;
    }

	public function index()
    {
        return view('maintainers.type-exams.index');
    }

    public function getTypeExams() {
        $type_exams = $this->type_exam->all();
        return $type_exams;
    }

    public function create()
    {
        return view('maintainers.type-exams.create');
    }

    public function store(TypeExamRequest $request)
    {
        $this->type_exam->create($request->all());

		return response()->json(array(
			'success' => true,
			'url'     => '/maintainers/type-exams'
		));
    }

    public function edit($id)
    {
        $type_exam = $this->type_exam->find($id);
        return view('maintainers.type-exams.edit', compact('type_exam'));
    }

    public function update(TypeExamRequest $request, $id)
    {
        $this->type_exam->update($request->all(), $id);

		return response()->json(array(
			'success' => true,
			'url'     => '/maintainers/type-exams'
		));
    }

    public function destroy($id)
    {
        $this->type_exam->delete($id);
        return redirect()->route('maintainers.type-exams.index');
    }
}
