<?php

namespace Controlqtime\Core\Entities;

use Controlqtime\Core\WebServices\Biometry\Biometry;
use Illuminate\Database\Eloquent\Model as Eloquent;

class ActivateEmployee extends Eloquent
{
    /**
     * @var Biometry
     */
    private $biometry;

    /**
     * @var Employee
     */
    private $employee;

    /**
     * ActivateEmployee constructor.
     */
    public function __construct()
    {
        $this->biometry = new Biometry();
        $this->employee = new Employee();
    }

    /**
     * Se verifica si contiene imágenes en cada ítem. En caso afirmativo habilita Employee en Biometry y CQTime.
     *
     * @param $id
     *
     * @return mixed
     */
    public function checkStateUpdateEmployee($id)
    {
        $employee = $this->employee->with([
            'certifications.imageable', 'specialities.imageable', 'professionalLicenses.imageable',
            'disabilities.imageable', 'diseases.imageable', 'exams.imageable', 'contract',
        ])->findOrFail($id);
        
        if (is_null($employee->contract)) {
            return $this->saveStateDisableEmployee($employee);
        }

        if ($employee->images_identity_card->isEmpty()) {
            return $this->saveStateDisableEmployee($employee);
        }

        if ($employee->images_criminal_record->isEmpty()) {
            return $this->saveStateDisableEmployee($employee);
        }

        if ($employee->images_health_certificate->isEmpty()) {
            return $this->saveStateDisableEmployee($employee);
        }

        if ($employee->images_pension_certificate->isEmpty()) {
            return $this->saveStateDisableEmployee($employee);
        }

        foreach ($employee->certifications as $certification) {
            if ($certification->imageable->count() == 0) {
                return $this->saveStateDisableEmployee($employee);
            }
        }

        foreach ($employee->disabilities as $disability) {
            if ($disability->imageable->count() == 0) {
                return $this->saveStateDisableEmployee($employee);
            }
        }

        foreach ($employee->diseases as $disease) {
            if ($disease->imageable->count() == 0) {
                return $this->saveStateDisableEmployee($employee);
            }
        }

        foreach ($employee->exams as $exam) {
            if ($exam->imageable->count() == 0) {
                return $this->saveStateDisableEmployee($employee);
            }
        }

        foreach ($employee->familyResponsabilities as $family_responsability) {
            if ($family_responsability->imageable->count() == 0) {
                return $this->saveStateDisableEmployee($employee);
            }
        }

        foreach ($employee->professionalLicenses as $professional_license) {
            if ($professional_license->imageable->count() == 0) {
                return $this->saveStateDisableEmployee($employee);
            }
        }

        foreach ($employee->specialities as $speciality) {
            if ($speciality->imageable->count() == 0) {
                return $this->saveStateDisableEmployee($employee);
            }
        }

        return $this->saveStateEnableEmployee($employee);
    }

    /**
     * Únicamente deshabilita a Employee de Biometry y CQTime si este está habilitado.
     *
     * @param $employee
     *
     * @return mixed
     */
    public function saveStateDisableEmployee($employee)
    {
        if ($employee->state != 'disable') {
            $this->biometry->delete($employee);
        }

        $employee->state = 'disable';
        $employee->condition = 'unavailable';

        return $employee->save();
    }

    /**
     * Únicamente habilita a Employee de Biometry y CQTime si este está deshabilitado.
     *
     * @param $employee
     *
     * @return mixed
     */
    private function saveStateEnableEmployee($employee)
    {
        if ($employee->state != 'enable') {
            $this->biometry->create($employee);
        }

        $employee->state = 'enable';

        return $employee->save();
    }
}
