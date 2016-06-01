<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Core\Contracts\ContactEmployeeRepoInterface;
use Controlqtime\Core\Contracts\EmployeeRepoInterface;
use Controlqtime\Core\Contracts\RepresentativeCompanyRepoInterface;
use Illuminate\Http\Request;
use Controlqtime\Http\Requests;
use Controlqtime\Core\Contracts\CompanyRepoInterface;
use Controlqtime\Core\Contracts\ProvinceRepoInterface;
use Controlqtime\Core\Contracts\RegionRepoInterface;
use Controlqtime\Core\Contracts\TrademarkRepoInterface;

class AjaxLoadController extends Controller {

	protected $company;
	protected $employee;
	protected $contact_employee;
	protected $representative_company;
	protected $province;
	protected $region;
	protected $trademark;

	public function __construct(RegionRepoInterface $region, ProvinceRepoInterface $province, CompanyRepoInterface $company, RepresentativeCompanyRepoInterface $representative_company, TrademarkRepoInterface $trademark, EmployeeRepoInterface $employee, ContactEmployeeRepoInterface $contact_employee)
	{
		$this->company              = $company;
		$this->employee             = $employee;
		$this->contact_employee 	= $contact_employee;
		$this->representative_company = $representative_company;
		$this->province             = $province;
		$this->region               = $region;
		$this->trademark            = $trademark;
	}

	public function loadProvinces(Request $request)
	{
		return $this->region->findProvinces($request->get('id'));
	}

	public function loadCommunes(Request $request)
	{
		return $this->province->findCommunes($request->get('id'));
	}

	public function verificaEmail(Request $request)
	{
		switch ($request->get('element'))
		{
			case 'Company':
				$email = $this->company->whereFirst('email_company', $request->get('email'), ['email_company']);
				break;

			case 'Representative':
				$email = $this->representative_company->whereFirst('email_representative', $request->get('email'), ['email_representative']);
				break;

			case 'Employee':
				$email = $this->employee->whereFirst('email_employee', $request->get('email', ['email_employee']));
				break;
				
			case 'EmailContactEmployee';
				$email = $this->contact_employee->whereFirst('email_contact', $request->get('email', ['email_contact']));
				break;
		}

		if ( $email )
			return response()->json(['success' => false], 400);

		return response()->json(['success' => true], 200);
	}

	public function loadModelVehicles(Request $request)
	{
		return $this->trademark->findModelVehicles($request->get('id'));
	}

	public function loadRouteAndVehicleSelectedInRound(Request $request)
	{
		$round = Round::with(['route', 'vehicle'])->find($request->get('id'));

		return $round;
	}
}
