<?php

namespace Controlqtime\Http\Controllers;

use Illuminate\Http\Request;
use Controlqtime\Core\Entities\Employee;

class RemunerationController extends Controller
{
	/**
	 * @var Employee
	 */
	protected $employee;
	
	public function __construct(Employee $employee)
	{
		$this->employee = $employee;
	}
	
	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		$employees  = $this->employee->enabled()->pluck('full_name', 'id');
		$employee   = $this->employee->with(['contract'])->firstOrFail();
		
		return view('human-resources.remunerations.index', compact(
			'employees', 'employee'
		));
	}
}
