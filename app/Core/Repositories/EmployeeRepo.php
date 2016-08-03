<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\EmployeeRepoInterface;
use Controlqtime\Core\Entities\Employee;
use Controlqtime\Core\Repositories\Base\BaseRepo;
use Controlqtime\Core\Traits\ListsTrait;
use Controlqtime\Core\Traits\WhereMethodsTrait;
use Controlqtime\Core\WebServices\Biometry\Biometry;

class EmployeeRepo extends BaseRepo implements EmployeeRepoInterface
{
	use ListsTrait, WhereMethodsTrait;

	protected $model;
	protected $biometry;

	public function __construct(Employee $model)
	{
		$this->model = $model;
		$this->biometry = new Biometry();
	}

	public function checkStateUpdateEmployee($id)
	{
		$employee = parent::find($id, [
			'certifications.imageCertificationEmployees', 'disabilities.ImageDisabilityEmployees',
			'diseases.imageDiseaseEmployees', 'exams.imageExamEmployees',
			'familyResponsabilities.imageFamilyResponsabilityEmployees',
			'professionalLicenses.imageProfessionalLicenseEmployees', 'specialities.imageSpecialityEmployees'
		]);

		foreach ($employee->certifications as $certification)
		{
			if ( count($certification->imageCertificationEmployees) == 0 )
				return $this->saveStateDisableEmployee($employee);
		}

		foreach ($employee->disabilities as $disability)
		{
			if ( count($disability->imageDisabilityEmployees) == 0 )
				return $this->saveStateDisableEmployee($employee);
		}

		foreach ($employee->diseases as $disease)
		{
			if ( count($disease->imageDiseaseEmployees) == 0 )
				return $this->saveStateDisableEmployee($employee);
		}

		foreach ($employee->exams as $exam)
		{
			if ( count($exam->imageExamEmployees) == 0 )
				return $this->saveStateDisableEmployee($employee);
		}

		foreach ($employee->familyResponsabilities as $family_responsability)
		{
			if ( count($family_responsability->imageFamilyResponsabilityEmployees) == 0 )
				return $this->saveStateDisableEmployee($employee);
		}

		foreach ($employee->professionalLicenses as $professional_license)
		{
			if ( count($professional_license->imageProfessionalLicenseEmployees) == 0 )
				return $this->saveStateDisableEmployee($employee);
		}

		foreach ($employee->specialities as $speciality)
		{
			if ( count($speciality->imageSpecialityEmployees) == 0 )
				return $this->saveStateDisableEmployee($employee);
		}

		return $this->saveStateEnableEmployee($employee);
	}

	public function saveStateDisableEmployee($employee)
	{
		if ( $employee->state != 'disable' )
		{
			$this->biometry->delete($employee);
		}

		$employee->state = 'disable';
		$employee->condition = 'unavailable';

		return $employee->save();
	}

	public function saveStateEnableEmployee($employee)
	{
		if ( $employee->state != 'enable' )
		{
			$this->biometry->create($employee);
		}

		$employee->state = 'enable';
		$employee->condition = 'available';

		return $employee->save();
	}

}