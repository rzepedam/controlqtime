<?php

	namespace Controlqtime\Http\Controllers;

	use Exception;
	use Illuminate\Http\Request;
	use Controlqtime\Core\Entities\Visit;
	use Controlqtime\Core\Entities\Region;
	use Controlqtime\Core\Entities\Vehicle;
	use Controlqtime\Core\Entities\Company;
	use Controlqtime\Core\Entities\Employee;
	use Controlqtime\Core\Entities\Province;
	use Controlqtime\Core\Entities\Trademark;
	use Controlqtime\Core\Entities\ContactEmployee;
	use Controlqtime\Core\Entities\LegalRepresentative;

	class AjaxLoadController extends Controller
	{
		/**
		 * @var string
		 */
		private $dirEntity = 'Controlqtime\Core\Entities\\';

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
		 * @var Visit
		 */
		protected $visit;

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
		 * @param Company $company
		 * @param ContactEmployee $contactEmployee
		 * @param Employee $employee
		 * @param LegalRepresentative $legalRepresentative
		 * @param Province $province
		 * @param Region $region
		 * @param Visit $visit
		 * @param Trademark $trademark
		 * @param Vehicle $vehicle
		 */
		public function __construct(Company $company, ContactEmployee $contactEmployee, Employee $employee,
			LegalRepresentative $legalRepresentative, Province $province, Region $region, Visit $visit,
			Trademark $trademark, Vehicle $vehicle)
		{
			$this->company             = $company;
			$this->contactEmployee     = $contactEmployee;
			$this->employee            = $employee;
			$this->legalRepresentative = $legalRepresentative;
			$this->province            = $province;
			$this->region              = $region;
			$this->visit               = $visit;
			$this->trademark           = $trademark;
			$this->vehicle             = $vehicle;
		}

		/**
		 * @return mixed
		 */
		public function loadProvinces()
		{
			return $this->region->findOrFail(request('id'))->provinces->pluck('name', 'id');
		}

		/**
		 * @return mixed
		 */
		public function loadCommunes()
		{
			return $this->province->findOrFail(request('id'))->communes->pluck('name', 'id');
		}

		/**
		 * @return \Illuminate\Http\JsonResponse
		 */
		public function verificaEmail()
		{
			try
			{
				switch ( request('element') )
				{
					case 'Company':
						$this->company->where('email_company', request('email'))->firstOrFail();
						break;

					case 'Representative':
						$this->legalRepresentative->where('email_representative', request('email'))->firstOrFail();
						break;

					case 'Employee':
						$this->employee->where('email_employee', request('email'))->firstOrFail();
						break;

					case 'Visit':
						$this->visit->where('email', request('email'))->firstOrFail();
						break;

					default:
						$classPolimorphic = explode(',', request('element'));
						$this->contactEmployee->where('email_contact', request('email'))
							->where('contactsable_type', $this->dirEntity . $classPolimorphic[1])
							->firstOrFail();
						break;
				}

				return response()->json([ 'status' => true ], 400);
			} catch ( Exception $e )
			{
				return response()->json([ 'status' => 'false', 'errors' => $e->getMessage() ], 200);
			}
		}

		/**
		 * @return mixed
		 */
		public function loadModelVehicles()
		{
			return $this->trademark->findOrFail(request('id'))->modelVehicles->pluck('name', 'id');
		}

		/**
		 * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model
		 */
		public function loadDetailVehicle()
		{
			$vehicle = $this->vehicle->with([ 'modelVehicle.trademark' ])->findOrFail(request('id'));

			return $vehicle;
		}
	}
