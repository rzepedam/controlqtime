<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;

use App\TypeExam;
use App\Http\Requests\TypeExamRequest;

class TypeExamController extends Controller
{
	public function index(Request $request)
    {
        $type_exams = TypeExam::name($request->get('table_search'))->orderBy('name')->paginate(20);
        return view('maintainers.type-exams.index', compact('type_exams'));
    }

    public function create()
    {
        return view('maintainers.type-exams.create');
    }

    public function store(TypeExamRequest $request)
    {
        TypeExam::create($request->all());
        Session::flash('success', 'El registro fue almacenado satisfactoriamente.');
        return redirect()->route('maintainers.type-exams.index');
    }

    public function edit($id)
    {
        $type_exam = TypeExam::findOrFail($id);
        return view('maintainers.type-exams.edit', compact('type_exam'));
    }

    public function update(TypeExamRequest $request, $id)
    {
        $type_exam = TypeExam::findOrFail($id);
        $message = 'El registro ' . $type_exam->name . ' fue actualizado satisfactoriamente.';
        $type_exam->fill($request->all());
        $type_exam->save();
        Session::flash('success', $message);
        return redirect()->route('maintainers.type-exams.index');
    }

    public function destroy($id)
    {
        $type_exam = TypeExam::findOrFail($id);
        $type_exam->delete();
        Session::flash('success', 'El registro ' . $type_exam->name . ' fue eliminado satisfactoriamente.');
        return redirect()->route('maintainers.type-exams.index');
    }
}
