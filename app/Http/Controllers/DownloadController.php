<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Core\Entities\Employee;
use Illuminate\Http\Request;
use Illuminate\Log\Writer as Log;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class DownloadController extends Controller
{
    /**
     * @var Employee
     */
    protected $employee;

    /**
     * @var Log
     */
    protected $log;

    /**
     * DownloadController constructor.
     *
     * @param Employee $employee
     * @param Log      $log
     */
    public function __construct(Employee $employee, Log $log)
    {
        $this->employee = $employee;
        $this->log = $log;
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return file download
     */
    public function getFile(Request $request)
    {
        $file = Storage::disk('s3')->get($request->get('file'));

        return response($file, 200)->withHeaders([
            'Content-Disposition' => 'attachment; filename="'.$request->get('name').'"',
        ]);
    }

    /**
     * @return pdf in new tab
     */
    public function getPdf()
    {
        $employees = $this->employee->with(['nationality'])->get();
        $header = view('human-resources.employees.partials.pdf.header');
        $footer = view('human-resources.employees.partials.pdf.footer');
        $pdf = \PDF::loadView('human-resources.employees.partials.pdf.index', compact('employees'))
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
        Excel::create('excel', function ($excel) {
            $excel->sheet('Listado de Empleados', function ($sheet) {
                $employees = $this->employee->with(['company'])->get();
                $sheet->setBorder('A1:D1', 'thin', 'medium');
                $sheet->setHeight(['1' => '25']);

                for ($i = 1; $i <= count($employees) + 1; $i++) {
                    $sheet->cells('A'.$i.':D'.$i, function ($cells) {
                        $cells->setFontFamily('Open Sans');
                        $cells->setBorder('thin', 'thin');
                    });

                    $sheet->cells('A1:D1', function ($cells) {
                        $cells->setBackground('#3498db');
                        $cells->setValignment('center');
                    });
                }

                $sheet->loadView('human-resources.employees.partials.pdf.index', compact('employees'));
            });
        })->download('xls');
    }
}
