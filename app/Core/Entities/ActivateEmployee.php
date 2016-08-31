<?php

namespace Controlqtime\Core\Entities;

use Controlqtime\Core\Contracts\EmployeeRepoInterface;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Controlqtime\Core\WebServices\Biometry\Biometry;
use Controlqtime\Core\Contracts\ActivateEmployeeInterface;

class ActivateEmployee extends Eloquent implements ActivateEmployeeInterface
{
	/**
	 * @var Biometry
	 */
	protected $biometry;
	/**
	 * @var EmployeeRepoInterface
	 */
	private $employee;

	/**
	 * ActivateEmployee constructor.
	 * @param EmployeeRepoInterface $employee
	 */
	public function __construct(EmployeeRepoInterface $employee)
	{
		$this->biometry = new Biometry();
		$this->employee = $employee;
	}

	/**
	 * Se verifica si contiene imágenes en cada ítem. En caso afirmativo habilita Employee en Biometry y CQTime
	 *
	 * @param $id
	 * @return mixed
	 */
	public function checkStateUpdateEmployee($id)
	{
		$employee = $this->employee->find($id, [
			'imageIdentityCardEmployees', 'imageCriminalRecordEmployees', 'imageHealthCertificateEmployees',
			'imagePensionCertificateEmployees', 'certifications.imageCertificationEmployees',
			'disabilities.ImageDisabilityEmployees', 'diseases.imageDiseaseEmployees',
			'exams.imageExamEmployees', 'familyResponsabilities.imageFamilyResponsabilityEmployees',
			'professionalLicenses.imageProfessionalLicenseEmployees', 'specialities.imageSpecialityEmployees',
			'contract'
		]);

		if ( is_null($employee->contract) )
			return $this->saveStateDisableEmployee($employee);

		if ( $employee->imageIdentityCardEmployees->count() == 0 )
			return $this->saveStateDisableEmployee($employee);

		if ( $employee->imageCriminalRecordEmployees->count() == 0 )
			return $this->saveStateDisableEmployee($employee);

		if ( $employee->imageHealthCertificateEmployees->count() == 0 )
			return $this->saveStateDisableEmployee($employee);

		if ( $employee->imagePensionCertificateEmployees->count() == 0 )
			return $this->saveStateDisableEmployee($employee);

		foreach ($employee->certifications as $certification)
		{
			if ( $certification->imageCertificationEmployees->count() == 0 )
				return $this->saveStateDisableEmployee($employee);
		}

		foreach ($employee->disabilities as $disability)
		{
			if ( $disability->imageDisabilityEmployees->count() == 0 )
				return $this->saveStateDisableEmployee($employee);
		}

		foreach ($employee->diseases as $disease)
		{
			if ( $disease->imageDiseaseEmployees->count() == 0 )
				return $this->saveStateDisableEmployee($employee);
		}

		foreach ($employee->exams as $exam)
		{
			if ( $exam->imageExamEmployees->count() == 0 )
				return $this->saveStateDisableEmployee($employee);
		}

		foreach ($employee->familyResponsabilities as $family_responsability)
		{
			if ( $family_responsability->imageFamilyResponsabilityEmployees->count() == 0 )
				return $this->saveStateDisableEmployee($employee);
		}

		foreach ($employee->professionalLicenses as $professional_license)
		{
			if ( $professional_license->imageProfessionalLicenseEmployees->count() == 0 )
				return $this->saveStateDisableEmployee($employee);
		}

		foreach ($employee->specialities as $speciality)
		{
			if ( $speciality->imageSpecialityEmployees->count() == 0 )
				return $this->saveStateDisableEmployee($employee);
		}

		return $this->saveStateEnableEmployee($employee);
	}

	/**
	 * Únicamente deshabilita a Employee de Biometry y CQTime si este está habilitado
	 *
	 * @param $employee
	 * @return mixed
	 */
	private function saveStateDisableEmployee($employee)
	{
		if ( $employee->state != 'disable' )
		{
			$this->biometry->delete($employee);
		}

		$employee->state = 'disable';
		$employee->condition = 'unavailable';

		return $employee->save();
	}

	/**
	 * Únicamente habilita a Employee de Biometry y CQTime si este está deshabilitado
	 *
	 * @param $employee
	 * @return mixed
	 */
	private function saveStateEnableEmployee($employee)
	{
		if ( $employee->state != 'enable' )
		{
			$this->biometry->create($employee);
		}

		$employee->state = 'enable';

		return $employee->save();
	}

}
