<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Core\Contracts\EmployeeRepoInterface;
use Illuminate\Http\Request;

use Maatwebsite\Excel\Facades\Excel;

class DownloadController extends Controller {

	protected $employee;
	protected $excel;

	public function __construct(EmployeeRepoInterface $employee)
	{
		$this->employee = $employee;
	}

	public function getFile(Request $request)
	{
		return response()->download(public_path() . $request->get('file'));
	}

	public function getPdf()
	{
		$employees = $this->employee->all(['nationality']);
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

	public function getExcel()
	{
		Excel::create('excel', function ($excel)
		{
			$excel->sheet('Listado de Empleados', function ($sheet)
			{

				$employees = $this->employee->all(['company']);

				$sheet->setBorder('A1:D1', 'thin', 'medium');
				$sheet->setHeight(array(
					'1' => '25'
				));

				for ($i = 1; $i <= count($employees) + 1; $i ++)
				{
					$sheet->cells('A' . $i . ':D' . $i, function ($cells)
					{
						$cells->setFontFamily('Open Sans');
						$cells->setBorder('thin', 'thin');
					});

					$sheet->cells('A1:D1', function ($cells)
					{
						$cells->setBackground('#3498db');
						$cells->setValignment('center');
					});
				}

				$sheet->loadView('human-resources.employees.partials.pdf.index', compact('employees'));
			});
		})->download('xls');
	}
}
