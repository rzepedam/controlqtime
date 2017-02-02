<?php

namespace Controlqtime\Http\Controllers;

use Exception;
use Illuminate\Log\Writer as Log;
use Controlqtime\Core\Entities\Employee;

class RemunerationController extends Controller
{
	/**
	 * @var Employee
	 */
	protected $employee;
	
	/**
	 * @var Log
	 */
	protected $log;
	
	public function __construct(Employee $employee, Log $log)
	{
		$this->employee = $employee;
		$this->log      = $log;
	}
	
	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		$employees = $this->employee->enabled()->pluck('full_name', 'id');
		$employee  = $this->employee->with(['contract'])->firstOrFail();
		
		return view('human-resources.remunerations.index', compact(
			'employees', 'employee'
		));
	}
	
	public function loadDataForEmployeeSelected()
	{
		try
		{
			$employee = $this->employee->with([
				'contract', 'contract.area', 'contract.position'
			])->findOrFail(request('employee'));
			
			$daysWorked        = $employee->getDaysWorkedInTheMonthAttribute();
			$daysDelays        = $employee->getNumDaysDelaysInTheMonthAttribute();
			$daysNonAssistance = $employee->getDaysNonAssistanceInTheMonthAttribute();
			$daysExtraHours    = $employee->getDaysExtraHoursInTheMonthAttribute();
			
			$sueldoBase             = $employee->contract->getSueldoBaseAttribute();
			$gratification          = $employee->contract->getGratificationAttribute();
			$valorTotalHorasExtra   = $employee->contract->getValorTotalHorasExtraAttribute();
			$valorInasistencia      = $employee->contract->getValorInasistenciaAttribute();
			$valorAtraso            = $employee->contract->getValorAtrasoAttribute();
			$totalAsistenciaAtrasos = $employee->contract->getTotalAsistenciaAtrasosAttribute();
			$totalImponible         = $employee->contract->getTotalImponibleAttribute();
			
			$asignacionFamiliar = $employee->contract->getAsignacionFamiliarAttribute();
			$mobilization       = $employee->contract->getMobilizationMoneyFieldAttribute();
			$collation          = $employee->contract->getCollationMoneyFieldAttribute();
			$bonoNoImponible    = $employee->contract->getBonoNoImponibleAttribute();
			$totalHaber         = $employee->contract->getTotalHaberAttribute();
			
			$totalPension      = $employee->contract->getTotalPensionAttribute();
			$seguroCesantia    = $employee->contract->getSeguroCesantiaAttribute();
			$totalForecast     = $employee->contract->getTotalForecastAttribute();
			$descuentosAfectos = $employee->contract->getDescuentosAfectosAttribute();
			$baseTributable    = $employee->contract->getBaseTributableAttribute();
			
			$valorImpuestoSegundaCategoria = $employee->contract->getValorImpuestoSegundaCategoriaAttribute();
			$rebajaImpuesto                = $employee->contract->getRebajaImpuestoAttribute();
			$impuestoUnico                 = $employee->contract->getImpuestoUnicoAttribute();
			$totalDescuentos               = $employee->contract->getTotalDescuentosAttribute();
			$sueldoLiquido                 = $employee->contract->getSueldoLiquidoAttribute();
			
			return response()->json([
				'employee'                      => $employee, 'daysWorked' => $daysWorked,
				'daysDelays'                    => $daysDelays, 'daysNonAssistance' => $daysNonAssistance,
				'daysExtraHours'                => $daysExtraHours, 'sueldoBase' => $sueldoBase,
				'gratification'                 => $gratification, 'valorTotalHorasExtra' => $valorTotalHorasExtra,
				'valorInasistencia'             => $valorInasistencia, 'valorAtraso' => $valorAtraso,
				'totalAsistenciaAtrasos'        => $totalAsistenciaAtrasos, 'totalImponible' => $totalImponible,
				'asignacionFamiliar'            => $asignacionFamiliar, 'mobilization' => $mobilization,
				'collation'                     => $collation, 'bonoNoImponible' => $bonoNoImponible,
				'totalHaber'                    => $totalHaber, 'totalPension' => $totalPension,
				'seguroCesantia'                => $seguroCesantia, 'totalForecast' => $totalForecast,
				'descuentosAfectos'             => $descuentosAfectos, 'baseTributable' => $baseTributable,
				'valorImpuestoSegundaCategoria' => $valorImpuestoSegundaCategoria, 'rebajaImpuesto' => $rebajaImpuesto,
				'impuestoUnico'                 => $impuestoUnico, 'totalDescuentos' => $totalDescuentos,
				'sueldoLiquido'                 => $sueldoLiquido
			]);
		} catch ( Exception $e )
		{
			$this->log->error("Error LoadDataForEmployeeSelected: " . $e->getMessage());
			
			return response()->json(['status' => false]);
		}
	}
}
