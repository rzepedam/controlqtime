<?php

namespace Controlqtime\Http\Controllers;

use Exception;
use Illuminate\Log\Writer as Log;
use Controlqtime\Core\Entities\TypeExam;
use Controlqtime\Http\Requests\TypeExamRequest;

class TypeExamController extends Controller
{
	/**
	 * @var Log
	 */
	protected $log;
	
	/**
	 * @var TypeExam
	 */
	protected $typeExam;
	
	/**
	 * TypeExamController constructor.
	 *
	 * @param Log      $log
	 * @param TypeExam $typeExam
	 */
	public function __construct(Log $log, TypeExam $typeExam)
	{
		$this->log      = $log;
		$this->typeExam = $typeExam;
	}
	
	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		return view('maintainers.type-exams.index');
	}
	
	/**
	 * @return mixed for Bootstrap-Table
	 */
	public function getTypeExams()
	{
		$typeExams = $this->typeExam->all();
		
		return $typeExams;
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
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function store(TypeExamRequest $request)
	{
		try
		{
			if ( ! $this->restore($request) )
			{
				$this->typeExam->create($request->all());
			}
			session()->flash('success', 'El registro fue almacenado satisfactoriamente.');
			
			return response()->json(['status' => true, 'url' => '/maintainers/type-exams']);
		} catch ( Exception $e )
		{
			$this->log->error("Error Store TypeExam: " . $e->getMessage());
			
			return response()->json(['status' => false]);
		}
	}
	
	/**
	 * @param $request
	 *
	 * @return bool
	 */
	public function restore($request)
	{
		try
		{
			$typeExam = $this->typeExam->onlyTrashed()->where('name', $request->get('name'))->firstOrFail();
			
			return $typeExam->restore();
		} catch ( Exception $e )
		{
			return false;
		}
	}
	
	/**
	 * @param $id
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function edit($id)
	{
		$typeExam = $this->typeExam->findOrFail($id);
		
		return view('maintainers.type-exams.edit', compact('typeExam'));
	}
	
	/**
	 * @param TypeExamRequest $request
	 * @param                 $id
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function update(TypeExamRequest $request, $id)
	{
		try
		{
			$this->typeExam->findOrFail($id)->fill($request->all())->saveOrFail();
			session()->flash('success', 'El registro fue actualizado satisfactoriamente.');
			
			return response()->json(['status' => true, 'url' => '/maintainers/type-exams']);
		} catch ( Exception $e )
		{
			$this->log->error("Error Update TypeExam: " . $e->getMessage());
			
			return response()->json(['status' => false]);
		}
	}
	
	/**
	 * @param $id
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function destroy($id)
	{
		$this->typeExam->destroy($id);
		
		return redirect()->route('type-exams.index');
	}
}
