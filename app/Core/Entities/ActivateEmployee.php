<?php

namespace Controlqtime\Core\Entities;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Controlqtime\Core\WebServices\Biometry\Biometry;
use Controlqtime\Core\Contracts\EmployeeRepoInterface;
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
	 *
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
	 *
	 * @return mixed
	 */
	public function checkStateUpdateEmployee($id)
	{
		$employee = $this->employee->find($id, [
			'certifications.imagesable', 'specialities.imagesable', 'professionalLicenses.imagesable',
			'disabilities.imagesable', 'diseases.imagesable', 'exams.imagesable', 'contract'
		]);
		
		if (is_null($employee->contract))
			return $this->saveStateDisableEmployee($employee);
		
		if ($employee->images_identity_card->isEmpty())
			return $this->saveStateDisableEmployee($employee);
		
		if ($employee->images_criminal_record->isEmpty())
			return $this->saveStateDisableEmployee($employee);
		
		if ($employee->images_health_certificate->isEmpty())
			return $this->saveStateDisableEmployee($employee);
		
		if ($employee->images_pension_certificate->isEmpty())
			return $this->saveStateDisableEmployee($employee);
		
		foreach ($employee->certifications as $certification)
		{
			if ($certification->imagesable->count() == 0)
				return $this->saveStateDisableEmployee($employee);
		}
		
		foreach ($employee->disabilities as $disability)
		{
			if ($disability->imagesable->count() == 0)
				return $this->saveStateDisableEmployee($employee);
		}
		
		foreach ($employee->diseases as $disease)
		{
			if ($disease->imagesable->count() == 0)
				return $this->saveStateDisableEmployee($employee);
		}
		
		foreach ($employee->exams as $exam)
		{
			if ($exam->imagesable->count() == 0)
				return $this->saveStateDisableEmployee($employee);
		}
		
		foreach ($employee->familyResponsabilities as $family_responsability)
		{
			if ($family_responsability->imagesable->count() == 0)
				return $this->saveStateDisableEmployee($employee);
		}
		
		foreach ($employee->professionalLicenses as $professional_license)
		{
			if ($professional_license->imagesable->count() == 0)
				return $this->saveStateDisableEmployee($employee);
		}
		
		foreach ($employee->specialities as $speciality)
		{
			if ($speciality->imagesable->count() == 0)
				return $this->saveStateDisableEmployee($employee);
		}
		
		return $this->saveStateEnableEmployee($employee);
	}
	
	/**
	 * Únicamente deshabilita a Employee de Biometry y CQTime si este está habilitado
	 *
	 * @param $employee
	 *
	 * @return mixed
	 */
	public function saveStateDisableEmployee($employee)
	{
		if ($employee->state != 'disable')
		{
			$this->biometry->delete($employee);
		}
		
		$employee->state     = 'disable';
		$employee->condition = 'unavailable';
		
		return $employee->save();
	}
	
	/**
	 * Únicamente habilita a Employee de Biometry y CQTime si este está deshabilitado
	 *
	 * @param $employee
	 *
	 * @return mixed
	 */
	private function saveStateEnableEmployee($employee)
	{
		if ($employee->state != 'enable')
		{
			$this->biometry->create($employee);
		}
		
		$employee->state = 'enable';
		
		return $employee->save();
	}
	
}
