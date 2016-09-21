<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Core\Contracts\VehicleRepoInterface;
use Illuminate\Http\Request;
use Controlqtime\Core\Contracts\RegionRepoInterface;
use Controlqtime\Core\Contracts\CompanyRepoInterface;
use Controlqtime\Core\Contracts\EmployeeRepoInterface;
use Controlqtime\Core\Contracts\ProvinceRepoInterface;
use Controlqtime\Core\Contracts\TrademarkRepoInterface;
use Controlqtime\Core\Contracts\ContactEmployeeRepoInterface;
use Controlqtime\Core\Contracts\LegalRepresentativeRepoInterface;

class AjaxLoadController extends Controller
{
	/**
	 * @var CompanyRepoInterface
	 */
	protected $company;
	
	/**
	 * @var ContactEmployeeRepoInterface
	 */
	protected $contactEmployee;
	
	/**
	 * @var EmployeeRepoInterface
	 */
	protected $employee;
	
	/**
	 * @var LegalRepresentativeRepoInterface
	 */
	protected $legalRepresentative;
	
	/**
	 * @var ProvinceRepoInterface
	 */
	protected $province;
	
	/**
	 * @var RegionRepoInterface
	 */
	protected $region;
	
	/**
	 * @var TrademarkRepoInterface
	 */
	protected $trademark;
	
	/**
	 * @var VehicleRepoInterface
	 */
	protected $vehicle;
	
	/**
	 * AjaxLoadController constructor.
	 *
	 * @param RegionRepoInterface $region
	 * @param ProvinceRepoInterface $province
	 * @param CompanyRepoInterface $company
	 * @param LegalRepresentativeRepoInterface $legalRepresentative
	 * @param TrademarkRepoInterface $trademark
	 * @param EmployeeRepoInterface $employee
	 * @param ContactEmployeeRepoInterface $contactEmployee
	 * @param VehicleRepoInterface $vehicle
	 */
	public function __construct(RegionRepoInterface $region, ProvinceRepoInterface $province, CompanyRepoInterface $company, LegalRepresentativeRepoInterface $legalRepresentative, TrademarkRepoInterface $trademark, EmployeeRepoInterface $employee, ContactEmployeeRepoInterface $contactEmployee, VehicleRepoInterface $vehicle)
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
		switch ($request->get('element'))
		{
			case 'Company':
				$email = $this->company->whereFirst('email_company', $request->get('email'), ['email_company']);
				break;
			
			case 'Representative':
				$email = $this->legalRepresentative->whereFirst('email_representative', $request->get('email'), ['email_representative']);
				break;
			
			case 'Employee':
				$email = $this->employee->whereFirst('email_employee', $request->get('email', ['email_employee']));
				break;
			
			case 'EmailContactEmployee';
				$email = $this->contactEmployee->whereFirst('email_contact', $request->get('email', ['email_contact']));
				break;
		}
		
		if ($email)
			return response()->json(['success' => false], 400);
		
		return response()->json(['success' => true], 200);
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
		$vehicle = $this->vehicle->find($request->get('id'), ['modelVehicle.trademark', 'detailVehicle']);
		
		return $vehicle;
	}
}
