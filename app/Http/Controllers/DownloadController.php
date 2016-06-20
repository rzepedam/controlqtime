<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Core\Contracts\EmployeeRepoInterface;
use Controlqtime\Http\Requests;

class DownloadController extends Controller {

	protected $employee;

	public function __construct(EmployeeRepoInterface $employee)
	{
		$this->employee = $employee;
	}

	public function getPdf()
	{
		$employees = $this->employee->all(['company']);
		$header    = view('human-resources.employees.partials.pdf.header');
		$footer    = view('human-resources.employees.partials.pdf.footer');
		$pdf       = \PDF::loadView('human-resources.employees.partials.pdf.index', compact('employees'))
						->setOption('page-size', 'letter')
						->setOption('margin-top', '25mm')
						->setOption('margin-bottom', '14mm')
						->setOption('header-spacing', '4')
						->setOption('header-html', $header)
						->setOption('footer-html', $footer);

		return $pdf->inline();
	}
}
