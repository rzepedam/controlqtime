<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

use App\Exam;
use App\Http\Requests\ExamRequest;

class ExamController extends Controller
{
	public function index(Request $request)
    {
        $exams = Exam::name($request->get('table_search'))->orderBy('name')->paginate(20);
        return view('maintainers.exams.index', compact('exams'));
    }

    public function create()
    {
        return view('maintainers.exams.create');
    }

    public function store(ExamRequest $request)
    {
        Exam::create($request->all());
        Session::flash('success', 'El registro fue almacenado satisfactoriamente.');
        return redirect()->route('maintainers.exams.index');
    }

    public function edit($id)
    {
        $exam = Exam::findOrFail($id);
        return view('maintainers.exams.edit', compact('exam'));
    }

    public function update(ExamRequest $request, $id)
    {
        $exam = Exam::findOrFail($id);
        $message = 'El registro ' . $exam->name . ' fue actualizado satisfactoriamente.';
        $exam->fill($request->all());
        $exam->save();
        Session::flash('success', $message);
        return redirect()->route('maintainers.exams.index');
    }

    public function destroy($id)
    {
        $exam = Exam::findOrFail($id);
        $exam->delete();
        Session::flash('success', 'El registro ' . $exam->name . ' fue eliminado satisfactoriamente.');
        return redirect()->route('maintainers.exams.index');
    }
}
