<?php

namespace Controlqtime\Core\Entities;

use Carbon\Carbon;
use Controlqtime\Core\Api\Entities\AccessControlApi;
use Controlqtime\Core\Api\Entities\DailyAssistanceApi;
use Controlqtime\Core\Helpers\FormatField;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;
use Jenssegers\Date\Date;

class Employee extends Eloquent
{
    use SoftDeletes;

    /**
	 * @var array
	 */
	protected $dates = [
		'birthday', 'deleted_at',
	];

    /**
     * @var array
     */
    protected $fillable = [
        'male_surname', 'female_surname', 'first_name', 'second_name', 'full_name', 'doc', 'rut',
        'birthday', 'is_male', 'nationality_id', 'marital_status_id', 'email_employee', 'state',
    ];

	/**
	 * @var array
	 */
	protected $with = [
    	'contract.company', 'user'
    ];

    /**
     * @param $query
     *
     * @return enable $employees
     */
    public function scopeEnabled($query)
    {
        return $query->whereState('enable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function accessControls()
    {
        return $this->hasMany(AccessControlApi::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function dailyAssistances()
    {
        return $this->hasMany(DailyAssistanceApi::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function address()
    {
        return $this->morphOne(Address::class, 'addressable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function contactsable()
    {
        return $this->morphMany(ContactEmployee::class, 'contactsable');
    }

    /**
     * @param $request 'id_delete_contact'
     */
    public function deleteContacts($request)
    {
        $decodeRequest = json_decode($request);

        if (!empty($decodeRequest)) {
            for ($i = 0; $i < count($decodeRequest); $i++) {
                $contact = $this->contactsable()->findOrFail($decodeRequest[$i]);
                $contact->delete();
            }
        }
    }

    /**
     * @param $request 'Session step 1'
     */
    public function createContacts($request)
    {
        for ($i = 0; $i < $request['count_contacts']; $i++) {
            $this->contactsable()->updateOrCreate(
                ['id' => $request['id_contact'][$i]], [
                'contactsable_type'       => 'Controlqtime\Core\Entities\Employee',
                'contact_relationship_id' => $request['contact_relationship_id'][$i],
                'name_contact'            => $request['name_contact'][$i],
                'email_contact'           => $request['email_contact'][$i],
                'address_contact'         => $request['address_contact'][$i],
                'tel_contact'             => $request['tel_contact'][$i],
            ]);
        }
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function familyRelationships()
    {
        return $this->hasMany(FamilyRelationship::class);
    }

    /**
     * @param $request 'id_delete_family_relationship'
     */
    public function deleteFamilyRelationships($request)
    {
        $decodeRequest = json_decode($request);

        if (!empty($request)) {
            for ($i = 0; $i < count($decodeRequest); $i++) {
                $familyRelationship = $this->familyRelationships()->findOrFail($decodeRequest[$i]);
                $familyRelationship->delete();
            }
        }
    }

    /**
     * @param $request 'Session step 1'
     */
    public function createFamilyRelationships($request)
    {
        for ($i = 0; $i < $request['count_family_relationships']; $i++) {
            $this->familyRelationships()->updateOrCreate(
                ['id' => $request['id_family_relationship'][$i]], [
                'relationship_id'    => $request['relationship_id'][$i],
                'employee_family_id' => $request['employee_family_id'][$i],
            ]);
        }
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function studies()
    {
        return $this->hasMany(Study::class);
    }

    /**
     * @param $request 'id_delete_study'
     */
    public function deleteStudies($request)
    {
        $decodeRequest = json_decode($request);

        if (!empty($decodeRequest)) {
            for ($i = 0; $i < count($decodeRequest); $i++) {
                $study = $this->studies()->findOrFail($decodeRequest[$i]);

                switch ($study->degree_id) {
                    case 1:
                    case 2:
                        $study->detailSchoolStudy()->delete();
                        break;
                    case 3:
                        $study->detailTechnicalStudy()->delete();
                        break;
                    case 4:
                    case 5:
                    case 6:
                    case 7:
                    case 8:
                        $study->detailCollegeStudy()->delete();
                        break;
                }

                $study->delete();
            }
        }
    }

    /**
     * @param $request 'Session step 2'
     */
    public function createStudies($request)
    {
        for ($i = 0; $i < $request['count_studies']; $i++) {
            $method = ($request['id_study'][$i] == '0') ? 'create' : 'update';

            $study = $this->studies()->updateOrCreate(
                ['id' => $request['id_study'][$i]], [
                'degree_id'      => $request['degree_id'][$i],
                'date_obtention' => $request['date_obtention'][$i],
            ]);

            switch ($request['degree_id'][$i]) {
                case 1:
                case 2:
                    $study->detailSchoolStudy()->$method([
                        'name_institution' => $request['name_institution'][$i],
                    ]);
                    break;
                case 3:
                    $study->detailTechnicalStudy()->$method([
                        'name_study'       => $request['name_study'][$i],
                        'name_institution' => $request['name_institution'][$i],
                    ]);
                    break;
                case 4:
                case 5:
                case 6:
                case 7:
                case 8:
                    $study->detailCollegeStudy()->$method([
                        'name_study'           => $request['name_study'][$i],
                        'institution_study_id' => $request['institution_study_id'][$i],
                    ]);
                    break;
            }
        }
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function certifications()
    {
        return $this->hasMany(Certification::class);
    }

    /**
     * @param $request 'id_delete_certification'
     */
    public function deleteCertifications($request)
    {
        $decodeRequest = json_decode($request);

        if (!empty($decodeRequest)) {
            for ($i = 0; $i < count($decodeRequest); $i++) {
                $certification = $this->certifications()->findOrFail($decodeRequest[$i]);
                $certification->imageable()->delete();
                $certification->delete();
            }
        }
    }

    /**
     * @param $request 'Session step 2'
     */
    public function createCertifications($request)
    {
        for ($i = 0; $i < $request['count_certifications']; $i++) {
            $this->certifications()->updateOrCreate(
                ['id' => $request['id_certification'][$i]], [
                'type_certification_id'        => $request['type_certification_id'][$i],
                'institution_certification_id' => $request['institution_certification_id'][$i],
                'emission_certification'       => $request['emission_certification'][$i],
                'expired_certification'        => $request['expired_certification'][$i],
            ]);
        }
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function specialities()
    {
        return $this->hasMany(Speciality::class);
    }

    /**
     * @param $request 'id_delete_speciality'
     */
    public function deleteSpecialities($request)
    {
        $decodeRequest = json_decode($request);

        if (!empty($decodeRequest)) {
            for ($i = 0; $i < count($decodeRequest); $i++) {
                $speciality = $this->specialities()->findOrFail($decodeRequest[$i]);
                $speciality->imageable()->delete();
                $speciality->delete();
            }
        }
    }

    /**
     * @param $request 'Session step 2'
     */
    public function createSpecialities($request)
    {
        for ($i = 0; $i < $request['count_specialities']; $i++) {
            $this->specialities()->updateOrCreate(
                ['id' => $request['id_speciality'][$i]], [
                'type_speciality_id'        => $request['type_speciality_id'][$i],
                'institution_speciality_id' => $request['institution_speciality_id'][$i],
                'emission_speciality'       => $request['emission_speciality'][$i],
                'expired_speciality'        => $request['expired_speciality'][$i],
            ]);
        }
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function professionalLicenses()
    {
        return $this->hasMany(ProfessionalLicense::class);
    }

    /**
     * @param $request 'id_delete_professional_license'
     */
    public function deleteProfessionalLicenses($request)
    {
        $decodeRequest = json_decode($request);

        if (!empty($decodeRequest)) {
            for ($i = 0; $i < count($decodeRequest); $i++) {
                $professionalLicense = $this->professionalLicenses()->findOrFail($decodeRequest[$i]);
                $professionalLicense->imageable()->delete();
                $professionalLicense->delete();
            }
        }
    }

    /**
     * @param $request 'Session step 2'
     */
    public function createLicenses($request)
    {
        for ($i = 0; $i < $request['count_professional_licenses']; $i++) {
            $this->professionalLicenses()->updateOrCreate(
                ['id' => $request['id_professional_license'][$i]], [
                'type_professional_license_id' => $request['type_professional_license_id'][$i],
                'emission_license'             => $request['emission_license'][$i],
                'expired_license'              => $request['expired_license'][$i],
                'is_donor'                     => $request['is_donor'.$i],
                'detail_license'               => $request['detail_license'][$i],
            ]);
        }
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function disabilities()
    {
        return $this->hasMany(Disability::class);
    }

    /**
     * @param $request 'id_delete_disability'
     */
    public function deleteDisabilities($request)
    {
        $decodeRequest = json_decode($request);

        if (!empty($decodeRequest)) {
            for ($i = 0; $i < count($decodeRequest); $i++) {
                $disability = $this->disabilities()->findOrFail($decodeRequest[$i]);
                $disability->imageable()->delete();
                $disability->delete();
            }
        }
    }

    /**
     * @param $request 'Session step 3'
     */
    public function createDisabilities($request)
    {
        for ($i = 0; $i < $request['count_disabilities']; $i++) {
            $this->disabilities()->updateOrCreate(
                ['id' => $request['id_disability'][$i]], [
                'type_disability_id'   => $request['type_disability_id'][$i],
                'treatment_disability' => $request['treatment_disability'.$i],
                'detail_disability'    => $request['detail_disability'][$i],
            ]);
        }
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function diseases()
    {
        return $this->hasMany(Disease::class);
    }

    /**
     * @param $request 'id_delete_disease'
     */
    public function deleteDiseases($request)
    {
        $decodeRequest = json_decode($request);

        if (!empty($decodeRequest)) {
            for ($i = 0; $i < count($decodeRequest); $i++) {
                $disease = $this->diseases()->findOrFail($decodeRequest[$i]);
                $disease->imageable()->delete();
                $disease->delete();
            }
        }
    }

    /**
     * @param $request 'Session step 3'
     */
    public function createDiseases($request)
    {
        for ($i = 0; $i < $request['count_diseases']; $i++) {
            $this->diseases()->updateOrCreate(
                ['id' => $request['id_disease'][$i]], [
                'type_disease_id'   => $request['type_disease_id'][$i],
                'treatment_disease' => $request['treatment_disease'.$i],
                'detail_disease'    => $request['detail_disease'][$i],
            ]);
        }
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function exams()
    {
        return $this->hasMany(Exam::class);
    }

    /**
     * @param $request 'id_delete_exam'
     */
    public function deleteExams($request)
    {
        $decodeRequest = json_decode($request);

        if (!empty($decodeRequest)) {
            for ($i = 0; $i < count($decodeRequest); $i++) {
                $exam = $this->exams()->findOrFail($decodeRequest[$i]);
                $exam->imageable()->delete();
                $exam->delete();
            }
        }
    }

    /**
     * @param $request 'Session step 3'
     */
    public function createExams($request)
    {
        for ($i = 0; $i < $request['count_exams']; $i++) {
            $this->exams()->updateOrCreate(
                ['id' => $request['id_exam'][$i]], [
                'type_exam_id'  => $request['type_exam_id'][$i],
                'emission_exam' => $request['emission_exam'][$i],
                'expired_exam'  => $request['expired_exam'][$i],
                'detail_exam'   => $request['detail_exam'][$i],
            ]);
        }
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function familyResponsabilities()
    {
        return $this->hasMany(FamilyResponsability::class);
    }

    /**
     * @param $request
     */
    public function deleteFamilyResponsabilities($request)
    {
        $decodeRequest = json_decode($request);

        if (!empty($decodeRequest)) {
            for ($i = 0; $i < count($decodeRequest); $i++) {
                $familyResponsability = $this->familyResponsabilities()->findOrFail($decodeRequest[$i]);
                $familyResponsability->imageable()->delete();
                $familyResponsability->delete();
            }
        }
    }

    /**
     * @param $request 'Session step 3'
     */
    public function createFamilyResponsabilities($request)
    {
        for ($i = 0; $i < $request['count_family_responsabilities']; $i++) {
            $this->familyResponsabilities()->updateOrCreate(
                ['id' => $request['id_family_responsability'][$i]], [
                'name_responsability' => $request['name_responsability'][$i],
                'rut_responsability'  => $request['rut_responsability'][$i],
                'relationship_id'     => $request['relationship_id'][$i],
            ]);
        }
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function contract()
    {
        return $this->hasOne(Contract::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function maritalStatus()
    {
        return $this->belongsTo(MaritalStatus::class)
            ->withTrashed();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function imageable()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function nationality()
    {
        return $this->belongsTo(Nationality::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne(User::class);
    }

    /**
     * @param string $value
     */
    public function setMaleSurnameAttribute($value)
    {
        $this->attributes['male_surname'] = ucfirst(mb_strtolower($value, 'utf-8'));
    }

    /**
     * @param string $value
     */
    public function setFemaleSurnameAttribute($value)
    {
        $this->attributes['female_surname'] = ucfirst(mb_strtolower($value, 'utf-8'));
    }

    /**
     * @param string $value
     */
    public function setFirstNameAttribute($value)
    {
        $this->attributes['first_name'] = ucfirst(mb_strtolower($value, 'utf-8'));
    }

    /**
     * @param string $value
     */
    public function setSecondNameAttribute($value)
    {
        $this->attributes['second_name'] = ucwords(mb_strtolower($value, 'utf-8'));
    }

    /**
     * @param $value 12.939.100-2 or O3000400
     *
     * @return mixed
     */
    public function setRutAttribute($value)
    {
        if ($this->attributes['doc'] !== 'passport') {
            return $this->attributes['rut'] = str_replace('.', '', $value);
        }

        return $this->attributes['rut'] = $value;
    }

    /**
     * @param $value M or F
     *
     * @return bool
     */
    public function setIsMaleAttribute($value)
    {
        if ('M' === $value) {
            return $this->attributes['is_male'] = true;
        }

        return $this->attributes['is_male'] = false;
    }

    /**
     * @param string $value
     */
    public function setAddressAttribute($value)
    {
        $this->attributes['address'] = ucfirst(mb_strtolower($value, 'utf-8'));
    }

    /**
     * @param string $value
     */
    public function setEmailEmployeeAttribute($value)
    {
        $this->attributes['email_employee'] = strtolower($value);
    }

    /**
     * @param string $value (01-01-2010)
     */
    public function setBirthdayAttribute($value)
    {
        $this->attributes['birthday'] = Carbon::createFromFormat('d-m-Y', $value);
    }

    /**
     * @param enum 'rut', 'passport', 'foreign'
     *
     * @return bool
     */
    public function getTypeDocAttribute($value)
    {
        return $this->doc !== 'passport';
    }

    /**
     * @param string $value format 12345678-9 or O3000400B passport
     *
     * @return string 12.345.678-9 or O3000400B
     */
    public function getRutAttribute($value)
    {
        if ($this->doc !== 'passport') {
            return FormatField::rut($value);
        }

        return $value;
    }

    /**
     * @param $value '1980-12-01'
     *
     * @return string '01-12-1980'
     */
    public function getBirthdayAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }
	
    public function routeNotificationFor()
    {
        return $this->email_employee;
    }
    /**
     * @return string 'Lunes 12 Diciembre 2016'
     */
    public function getBirthdayToSpanishFormatAttribute()
    {
        return Date::parse($this->birthday)->format('l j F Y');
    }

    /**
     * @return mixed '36'
     */
    public function getAgeAttribute()
    {
        return Carbon::parse($this->birthday)->age;
    }

    /**
     * @return string 'Lunes 12 Diciembre 2016'
     */
    public function getCreatedAtToSpanishFormatAttribute()
    {
        return Date::parse($this->created_at)->format('l j F Y H:i:s');
    }

    /**
     * @return string 'Lunes 12 Diciembre 2016'
     */
    public function getUpdatedAtToSpanishFormatAttribute()
    {
        return Date::parse($this->updated_at)->format('l j F Y H:i:s');
    }

    /**
     * @param bool
     *
     * @return bool
     */
    public function getIsMaleAttribute($value)
    {
        return $value === 1;
    }

    /**
     * @param bool
     *
     * @return string Masculino or Femenino
     */
    public function getIsMaleTextAttribute($value)
    {
        return $value ? 'Masculino' : 'Femenino';
    }

    /**
     * @return int
     */
    public function getNumImagesIdentityCardAttribute()
    {
        return $this->imageable()->where('path', 'like', '%IdentityCard%')->count();
    }

    /**
     * @return int
     */
    public function getNumImagesCriminalRecordAttribute()
    {
        return $this->imageable()->where('path', 'like', '%CriminalRecord%')->count();
    }

    /**
     * @return int
     */
    public function getNumImagesHealthCertificateAttribute()
    {
        return $this->imageable()->where('path', 'like', '%HealthCertificate%')->count();
    }

    /**
     * @return int
     */
    public function getNumImagesPensionCertificateAttribute()
    {
        return $this->imageable()->where('path', 'like', '%PensionCertificate%')->count();
    }

    /**
     * @return int
     */
    public function getNumCertificationsAttribute()
    {
        return count($this->certifications);
    }

    /**
     * @return int
     */
    public function getNumContactEmployeesAttribute()
    {
        return count($this->contactsable);
    }

    /**
     * @return int
     */
    public function getNumDisabilitiesAttribute()
    {
        return count($this->disabilities);
    }

    /**
     * @return int
     */
    public function getNumDiseasesAttribute()
    {
        return count($this->diseases);
    }

    /**
     * @return int
     */
    public function getNumExamsAttribute()
    {
        return count($this->exams);
    }

    /**
     * @return int
     */
    public function getNumFamilyRelationshipsAttribute()
    {
        return count($this->familyRelationships);
    }

    /**
     * @return int
     */
    public function getNumFamilyResponsabilitiesAttribute()
    {
        return count($this->familyResponsabilities);
    }

    /**
     * @return int
     */
    public function getNumProfessionalLicensesAttribute()
    {
        return count($this->professionalLicenses);
    }

    /**
     * @return int
     */
    public function getNumSpecialitiesAttribute()
    {
        return count($this->specialities);
    }

    /**
     * @return int
     */
    public function getNumStudiesAttribute()
    {
        return count($this->studies);
    }

    /**
     * @return all images related with Identity Card
     */
    public function getImagesIdentityCardAttribute()
    {
        return $this->imageable()->where('path', 'like', '%IdentityCard%')->get();
    }

    /**
     * @return all images related with Criminal Record
     */
    public function getImagesCriminalRecordAttribute()
    {
        return $this->imageable()->where('path', 'like', '%CriminalRecord%')->get();
    }

    /**
     * @return all images related with Health Certificate
     */
    public function getImagesHealthCertificateAttribute()
    {
        return $this->imageable()->where('path', 'like', '%HealthCertificate%')->get();
    }

    /**
     * @return all images related with Pension Certificate
     */
    public function getImagesPensionCertificateAttribute()
    {
        return $this->imageable()->where('path', 'like', '%PensionCertificate%')->get();
    }

    /**
     * @return int
     */
    public function getNumImagesCertificationAttribute()
    {
        $sum = 0;
        foreach ($this->certifications as $certification) {
            $sum += count($certification->imageable);
        }

        return $sum;
    }

    /**
     * @return int
     */
    public function getNumImagesSpecialityAttribute()
    {
        $sum = 0;
        foreach ($this->specialities as $speciality) {
            $sum += count($speciality->imageable);
        }

        return $sum;
    }

    /**
     * @return int
     */
    public function getNumImagesProfessionalLicensesAttribute()
    {
        $sum = 0;
        foreach ($this->professionalLicenses as $professionalLicense) {
            $sum += count($professionalLicense->imageable);
        }

        return $sum;
    }

    /**
     * @return int
     */
    public function getNumImagesDisabilitiesAttribute()
    {
        $sum = 0;
        foreach ($this->disabilities as $disability) {
            $sum += count($disability->imageable);
        }

        return $sum;
    }

    /**
     * @return int
     */
    public function getNumImagesDiseasesAttribute()
    {
        $sum = 0;
        foreach ($this->diseases as $disease) {
            $sum += count($disease->imageable);
        }

        return $sum;
    }

    /**
     * @return int
     */
    public function getNumImagesExamsAttribute()
    {
        $sum = 0;
        foreach ($this->exams as $exam) {
            $sum += count($exam->imageable);
        }

        return $sum;
    }

    /**
     * @return int
     */
    public function getNumImagesFamilyResponsabilitiesAttribute()
    {
        $sum = 0;
        foreach ($this->familyResponsabilities as $family_responsability) {
            $sum += count($family_responsability->imageable);
        }

        return $sum;
    }

    /**
     * @return int
     */
    public function getNumTotalImagesAttribute()
    {
        return $this->getNumImagesIdentityCardAttribute() + $this->getNumImagesCriminalRecordAttribute()
            + $this->getNumImagesHealthCertificateAttribute() + $this->getNumImagesPensionCertificateAttribute()
            + $this->getNumImagesCertificationAttribute() + $this->getNumImagesSpecialityAttribute()
            + $this->getNumImagesProfessionalLicensesAttribute() + $this->getNumImagesDisabilitiesAttribute()
            + $this->getNumImagesDiseasesAttribute() + $this->getNumImagesExamsAttribute()
            + $this->getNumImagesFamilyResponsabilitiesAttribute();
    }

    /**
     * @return mixed
     */
    private function dailyAssistanceForRemuneration()
    {
        $initMonth = Carbon::parse('first day of this month 00:00:00');
        $endMonth = Carbon::now();

        $dailyAssistances = $this->dailyAssistances()
            ->whereBetween('created_at', [$initMonth, $endMonth])
            ->get()
            ->groupBy(function ($item) {
                return Carbon::parse($item->created_at)->format('d');
            });

        return $dailyAssistances;
    }

    /**
     * @return array
     */
    public function getDaysWorkedInTheMonthAttribute()
    {
        $assistance = collect();
        $realAssistance = collect();
        $initMonth = Carbon::parse('first day of this month 00:00:00');
        $endMonth = Carbon::now();

        if ($this->contract->dayTrip->name === 'Lunes a viernes') {
            $this->dailyAssistanceForRemuneration()->each(function ($item) use ($assistance) {
                $assistance[] = Carbon::parse($item->min('created_at'))->format('Y-m-d');
            });

            while ($endMonth >= $initMonth) {
                if ($initMonth->isWeekday()) {
                    if ($assistance->contains($initMonth->format('Y-m-d'))) {
                        $realAssistance[] = 1;
                    }
                }

                $initMonth->addDay();
            }
        }

        return $realAssistance->count();
    }

    /**
     * @return array
     */
    private function daysDelaysInTheMonthAttribute()
    {
        $assistance = collect();

        if ($this->contract->dayTrip->name === 'Lunes a viernes') {
            $this->dailyAssistanceForRemuneration()->each(function ($item) use ($assistance) {
                $assistance[] = Carbon::parse($item->min('created_at'));
            });
        }

        return $assistance;
    }

    /**
     * @return int
     */
    public function getNumDaysDelaysInTheMonthAttribute()
    {
        $delays = collect();

        $this->daysDelaysInTheMonthAttribute()->each(function ($item) use ($delays) {
            if ($item->isWeekday()) {
                if ($item->format('H:i:s') > config('constants.time_limit')->format('H:i:s')) {
                    $delays[] = 1;
                }
            }
        });

        return $delays->sum();
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function detailDaysDelaysInTheMonth()
    {
        $delays = collect();

        $this->daysDelaysInTheMonthAttribute()->each(function ($item) use ($delays) {
            $timeLimitString = $item->format('Y-m-d').' '.config('constants.time_limit')->format('H:i:s');
            $timeLimitCarbon = Carbon::createFromFormat('Y-m-d H:i:s', $timeLimitString);

            if ($item->isWeekday()) {
                if ($item->format('H:i:s') > config('constants.time_limit')->format('H:i:s')) {
                    $delays[] = $timeLimitCarbon->diffInHours($item);
                }
            }
        });

        return $delays->sum();
    }

    /**
     * @return array
     */
    public function getDaysNonAssistanceInTheMonthAttribute()
    {
        $assistance = collect();
        $realAssistance = collect();
        $totalDaysAssistance = collect();
        $initMonth = Carbon::parse('first day of this month 00:00:00');
        $now = Carbon::now();

        if ($this->contract->dayTrip->name === 'Lunes a viernes') {
            $this->dailyAssistanceForRemuneration()->each(function ($item) use ($assistance) {
                $assistance[] = Carbon::parse($item->min('created_at'))->format('Y-m-d');
            });

            while ($now >= $initMonth) {
                if ($initMonth->isWeekday()) {
                    if ($assistance->contains($initMonth->format('Y-m-d'))) {
                        $realAssistance[] = 1;
                    }

                    $totalDaysAssistance[] = 1;
                }
                $initMonth->addDay();
            }
        }

        $nonAssistance = $totalDaysAssistance->sum() - $realAssistance->sum();

        return $nonAssistance;
    }

    /**
     * @return array
     */
    public function getDaysExtraHoursInTheMonthAttribute()
    {
        $assistance = collect();
        $extraHours = collect();

        $this->dailyAssistanceForRemuneration()->each(function ($item) use ($assistance) {
            $assistance[] = Carbon::parse($item->max('created_at'));
        });

        $assistance->each(function ($item) use ($extraHours) {
            $workOut = Carbon::createFromFormat('Y-m-d H:i', $item->format('Y-m-d').' '.$this->contract->end_afternoon);

            if ($item->isWeekday()) {
                if ($item > $workOut) {
                    $extraHours[] = $item->diffInHours($workOut);
                }
            }
        });

        return $extraHours->sum();
    }
}
