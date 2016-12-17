<?php

namespace Controlqtime\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Controlqtime\Core\Entities\Region;
use Controlqtime\Core\Entities\Company;
use Controlqtime\Core\Entities\Vehicle;
use Controlqtime\Core\Entities\Employee;
use Controlqtime\Core\Entities\Province;
use Controlqtime\Core\Entities\Trademark;
use Controlqtime\Core\Entities\ContactEmployee;
use Controlqtime\Core\Entities\LegalRepresentative;

class AjaxLoadController extends Controller
{
	/**
	 * @var Company
	 */
	protected $company;
	
	/**
	 * @var ContactEmployee
	 */
	protected $contactEmployee;
	
	/**
	 * @var Employee
	 */
	protected $employee;
	
	/**
	 * @var LegalRepresentative
	 */
	protected $legalRepresentative;
	
	/**
	 * @var Province
	 */
	protected $province;
	
	/**
	 * @var Region
	 */
	protected $region;
	
	/**
	 * @var Trademark
	 */
	protected $trademark;
	
	/**
	 * @var Vehicle
	 */
	protected $vehicle;
	
	/**
	 * AjaxLoadController constructor.
	 *
	 * @param Company             $company
	 * @param ContactEmployee     $contactEmployee
	 * @param Employee            $employee
	 * @param LegalRepresentative $legalRepresentative
	 * @param Province            $province
	 * @param Region              $region
	 * @param Trademark           $trademark
	 * @param Vehicle             $vehicle
	 */
	public function __construct(Company $company, ContactEmployee $contactEmployee, Employee $employee,
		LegalRepresentative $legalRepresentative, Province $province, Region $region, Trademark $trademark,
		Vehicle $vehicle)
	{
		$this->company             = $company;
		$this->contactEmployee     = $contactEmployee;
		$this->employee            = $employee;
		$this->legalRepresentative = $legalRepresentative;
		$this->province            = $province;
		$this->region              = $region;
		$this->trademark           = $trademark;
		$this->vehicle             = $vehicle;
	}
	
	/**
	 * @param Request $request
	 *
	 * @return mixed
	 */
	public function loadProvinces(Request $request)
	{
		return $this->region->findProvinces($request->get('id'));
	}
	
	/**
	 * @param Request $request
	 *
	 * @return mixed
	 */
	public function loadCommunes(Request $request)
	{
		return $this->province->findCommunes($request->get('id'));
	}
	
	/**
	 * @param Request $request
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function verificaEmail(Request $request)
	{
		try
		{
			switch ( $request->get('element') )
			{
				case 'Company':
					$this->company->where('email_company', $request->get('email'))->firstOrFail();
					break;
				
				case 'Representative':
					$this->legalRepresentative->where('email_representative', $request->get('email'))->firstOrFail();
					break;
				
				case 'Employee':
					$this->employee->where('email_employee', $request->get('email'))->firstOrFail();
					break;
				
				case 'EmailContactEmployee';
					$this->contactEmployee->where('email_contact', $request->get('email'))->firstOrFail();
					break;
			}
			
			return response()->json(['status' => true], 400);
		} catch ( Exception $e )
		{
			return response()->json(['status' => 'false', 'errors' => $e->getMessage()], 200);
		}
	}
	
	/**
	 * @param Request $request
	 *
	 * @return mixed
	 */
	public function loadModelVehicles(Request $request)
	{
		return $this->trademark->findModelVehicles($request->get('id'));
	}
	
	/**
	 * @param Request $request
	 *
	 * @return mixed
	 */
	public function loadDetailVehicle(Request $request)
	{
		$vehicle = $this->vehicle->find($request->get('id'), ['modelVehicle.trademark']);
		
		return $vehicle;
	}
}
