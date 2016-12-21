<?php

namespace Controlqtime\Core\Entities;

use Carbon\Carbon;
use Jenssegers\Date\Date;
use Controlqtime\Core\Helpers\FormatField;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Controlqtime\Core\Api\Entities\AccessControlApi;
use Controlqtime\Core\Api\Entities\DailyAssistanceApi;

class Employee extends Eloquent
{
	use SoftDeletes;
	
	/**
	 * @var array
	 */
	protected $fillable = [
		'male_surname', 'female_surname', 'first_name', 'second_name', 'full_name', 'rut', 'birthday',
		'is_male', 'nationality_id', 'marital_status_id', 'forecast_id', 'pension_id', 'email_employee',
		'state'
	];
	
	/**
	 * @var array
	 */
	protected $dates = [
		'birthday', 'deleted_at'
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
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function contactEmployees()
	{
		return $this->hasMany(ContactEmployee::class);
	}
	
	/**
	 * @param $request 'id_delete_contact'
	 */
	public function deleteContacts($request)
	{
		if ( ! empty($request) )
		{
			$this->contactEmployees()->whereIn('id', $request)->delete();
		}
	}
	
	/**
	 * @param $request 'Session step 1'
	 */
	public function createContacts($request)
	{
		for ( $i = 0; $i < $request['count_contacts']; $i++ )
		{
			$this->contactEmployees()->updateOrCreate(
				['id' => $request['id_contact'][$i]], [
				'contact_relationship_id' => $request['contact_relationship_id'][$i],
				'name_contact'            => $request['name_contact'][$i],
				'email_contact'           => $request['email_contact'][$i],
				'address_contact'         => $request['address_contact'][$i],
				'tel_contact'             => $request['tel_contact'][$i]
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
		if ( ! empty($request) )
		{
			$this->familyRelationships()->whereIn('id', $request)->delete();
		}
	}
	
	/**
	 * @param $request 'Session step 1'
	 */
	public function createFamilyRelationships($request)
	{
		for ( $i = 0; $i < $request['count_family_relationships']; $i++ )
		{
			$this->familyRelationships()->updateOrCreate(
				['id' => $request['id_family_relationship'][$i]], [
				'relationship_id'    => $request['relationship_id'][$i],
				'employee_family_id' => $request['employee_family_id'][$i]
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
		if ( ! empty($request) )
		{
			for ( $i = 0; $i < count($request); $i++ )
			{
				$study = $this->studies()->findOrFail($request[$i]);
				
				switch ( $study->degree_id )
				{
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
			}
			$this->studies()->whereIn('id', $request)->delete();
		}
	}
	
	/**
	 * @param $request 'Session step 2'
	 */
	public function createStudies($request)
	{
		for ( $i = 0; $i < $request['count_studies']; $i++ )
		{
			$method = ($request['id_study'][$i] == '0') ? 'create' : 'update';
			
			$study = $this->studies()->updateOrCreate(
				['id' => $request['id_study'][$i]], [
				'degree_id'      => $request['degree_id'][$i],
				'date_obtention' => $request['date_obtention'][$i]
			]);
			
			switch ( $request['degree_id'][$i] )
			{
				case 1:
				case 2:
					$study->detailSchoolStudy()->$method([
						'name_institution' => $request['name_institution'][$i]
					]);
					break;
				case 3:
					$study->detailTechnicalStudy()->$method([
						'name_study'       => $request['name_study'][$i],
						'name_institution' => $request['name_institution'][$i]
					]);
					break;
				case 4:
				case 5:
				case 6:
				case 7:
				case 8:
					$study->detailCollegeStudy()->$method([
						'name_study'           => $request['name_study'][$i],
						'institution_study_id' => $request['institution_study_id'][$i]
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
		if ( ! empty($request) )
		{
			for ( $i = 0; $i < count($request); $i++ )
			{
				$certification = $this->certifications()->findOrFail($request[$i]);
				$certification->imagesable()->delete();
			}
			
			$this->certifications()->whereIn('id', $request)->delete();
		}
	}
	
	/**
	 * @param $request 'Session step 2'
	 */
	public function createCertifications($request)
	{
		for ( $i = 0; $i < $request['count_certifications']; $i++ )
		{
			$this->certifications()->updateOrCreate(
				['id' => $request['id_certification'][$i]], [
				'type_certification_id'        => $request['type_certification_id'][$i],
				'institution_certification_id' => $request['institution_certification_id'][$i],
				'emission_certification'       => $request['emission_certification'][$i],
				'expired_certification'        => $request['expired_certification'][$i]
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
		if ( ! empty($request) )
		{
			for ( $i = 0; $i < count($request); $i++ )
			{
				$speciality = $this->specialities()->findOrFail($request[$i]);
				$speciality->imagesable()->delete();
			}
			
			$this->specialities()->whereIn('id', $request)->delete();
		}
	}
	
	/**
	 * @param $request 'Session step 2'
	 */
	public function createSpecialities($request)
	{
		for ( $i = 0; $i < $request['count_specialities']; $i++ )
		{
			$this->specialities()->updateOrCreate(
				['id' => $request['id_speciality'][$i]], [
				'type_speciality_id'        => $request['type_speciality_id'][$i],
				'institution_speciality_id' => $request['institution_speciality_id'][$i],
				'emission_speciality'       => $request['emission_speciality'][$i],
				'expired_speciality'        => $request['expired_speciality'][$i]
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
		if ( ! empty($request) )
		{
			for ( $i = 0; $i < count($request); $i++ )
			{
				$professionalLicense = $this->professionalLicenses()->findOrFail($request[$i]);
				$professionalLicense->imagesable()->delete();
			}
			
			$this->professionalLicenses()->whereIn('id', $request)->delete();
		}
	}
	
	/**
	 * @param $request 'Session step 2'
	 */
	public function createLicenses($request)
	{
		for ( $i = 0; $i < $request['count_professional_licenses']; $i++ )
		{
			$this->professionalLicenses()->updateOrCreate(
				['id' => $request['id_professional_license'][$i]], [
				'type_professional_license_id' => $request['type_professional_license_id'][$i],
				'emission_license'             => $request['emission_license'][$i],
				'expired_license'              => $request['expired_license'][$i],
				'is_donor'                     => $request['is_donor' . $i],
				'detail_license'               => $request['detail_license'][$i]
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
		if ( ! empty($request) )
		{
			for ( $i = 0; $i < count($request); $i++ )
			{
				$disability = $this->disabilities()->findOrFail($request[$i]);
				$disability->imagesable()->delete();
			}
			
			$this->disabilities()->whereIn('id', $request)->delete();
		}
	}
	
	/**
	 * @param $request 'Session step 3'
	 */
	public function createDisabilities($request)
	{
		for ( $i = 0; $i < $request['count_disabilities']; $i++ )
		{
			$this->disabilities()->updateOrCreate(
				['id' => $request['id_disability'][$i]], [
				'type_disability_id'   => $request['type_disability_id'][$i],
				'treatment_disability' => $request['treatment_disability' . $i],
				'detail_disability'    => $request['detail_disability'][$i]
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
		if ( ! empty($request) )
		{
			for ( $i = 0; $i < count($request); $i++ )
			{
				$disease = $this->diseases()->findOrFail($request[$i]);
				$disease->imagesable()->delete();
			}
			
			$this->diseases()->whereIn('id', $request)->delete();
		}
	}
	
	/**
	 * @param $request 'Session step 3'
	 */
	public function createDiseases($request)
	{
		for ( $i = 0; $i < $request['count_diseases']; $i++ )
		{
			$this->diseases()->updateOrCreate(
				['id' => $request['id_disease'][$i]], [
				'type_disease_id'   => $request['type_disease_id'][$i],
				'treatment_disease' => $request['treatment_disease' . $i],
				'detail_disease'    => $request['detail_disease'][$i]
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
		if ( ! empty($request) )
		{
			for ( $i = 0; $i < count($request); $i++ )
			{
				$exam = $this->exams()->findOrFail($request[$i]);
				$exam->imagesable()->delete();
			}
			
			$this->exams()->whereIn('id', $request)->delete();
		}
	}
	
	/**
	 * @param $request 'Session step 3'
	 */
	public function createExams($request)
	{
		for ( $i = 0; $i < $request['count_exams']; $i++ )
		{
			$this->exams()->updateOrCreate(
				['id' => $request['id_exam'][$i]], [
				'type_exam_id'  => $request['type_exam_id'][$i],
				'emission_exam' => $request['emission_exam'][$i],
				'expired_exam'  => $request['expired_exam'][$i],
				'detail_exam'   => $request['detail_exam'][$i]
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
	 * @param $request 'id_delete_family_responsability'
	 */
	public function deleteFamilyResponsabilities($request)
	{
		if ( ! empty($request) )
		{
			for ( $i = 0; $i < count($request); $i++ )
			{
				$familyResponsability = $this->familyResponsabilities()->findOrFail($request[$i]);
				$familyResponsability->imagesable()->delete();
			}
			
			$this->familyResponsabilities()->whereIn('id', $request)->delete();
		}
	}
	
	/**
	 * @param $request 'Session step 3'
	 */
	public function createFamilyResponsabilities($request)
	{
		for ( $i = 0; $i < $request['count_family_responsabilities']; $i++ )
		{
			$this->familyResponsabilities()->updateOrCreate(
				['id' => $request['id_family_responsability'][$i]], [
				'name_responsability' => $request['name_responsability'][$i],
				'rut_responsability'  => $request['rut_responsability'][$i],
				'relationship_id'     => $request['relationship_id'][$i]
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
		return $this->belongsTo(MaritalStatus::class);
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function forecast()
	{
		return $this->belongsTo(Forecast::class);
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function pension()
	{
		return $this->belongsTo(Pension::class);
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\MorphMany
	 */
	public function imagesable()
	{
		return $this->morphMany(Image::class, 'imagesable');
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
	 * @param string $value format 12.345.678-9
	 */
	public function setRutAttribute($value)
	{
		$this->attributes['rut'] = str_replace('.', '', $value);
	}
	
	/**
	 * @param $value (M or F)
	 *
	 * @return bool
	 */
	public function setIsMaleAttribute($value)
	{
		if ( 'M' === $value )
		{
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
	 * @param string $value format 12345678-9
	 *
	 * @return string 12.345.678-9
	 */
	public function getRutAttribute($value)
	{
		return FormatField::rut($value);
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
	 * @param $value 'true' or 'false'
	 *
	 * @return string 'Masculino' or 'Femenino'
	 */
	public function getIsMaleAttribute($value)
	{
		return $value ? 'Masculino' : 'Femenino';
	}
	
	/**
	 *
	 * @return Boolean 'Masculino' => true or 'Femenino' => false
	 */
	public function getIsMaleEditAttribute()
	{
		return $this->is_male === 'Masculino';
	}
	
	/**
	 * @return int
	 */
	public function getNumImagesIdentityCardAttribute()
	{
		return $this->imagesable()->where('path', 'like', '%IdentityCard%')->count();
	}
	
	/**
	 * @return int
	 */
	public function getNumImagesCriminalRecordAttribute()
	{
		return $this->imagesable()->where('path', 'like', '%CriminalRecord%')->count();
	}
	
	/**
	 * @return int
	 */
	public function getNumImagesHealthCertificateAttribute()
	{
		return $this->imagesable()->where('path', 'like', '%HealthCertificate%')->count();
	}
	
	/**
	 * @return int
	 */
	public function getNumImagesPensionCertificateAttribute()
	{
		return $this->imagesable()->where('path', 'like', '%PensionCertificate%')->count();
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
		return count($this->contactEmployees);
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
		return $this->imagesable()->where('path', 'like', '%IdentityCard%')->get();
	}
	
	/**
	 * @return all images related with Criminal Record
	 */
	public function getImagesCriminalRecordAttribute()
	{
		return $this->imagesable()->where('path', 'like', '%CriminalRecord%')->get();
	}
	
	/**
	 * @return all images related with Health Certificate
	 */
	public function getImagesHealthCertificateAttribute()
	{
		return $this->imagesable()->where('path', 'like', '%HealthCertificate%')->get();
	}
	
	/**
	 * @return all images related with Pension Certificate
	 */
	public function getImagesPensionCertificateAttribute()
	{
		return $this->imagesable()->where('path', 'like', '%PensionCertificate%')->get();
	}
	
	/**
	 * @return int
	 */
	public function getNumImagesCertificationAttribute()
	{
		$sum = 0;
		foreach ( $this->certifications as $certification )
		{
			$sum += count($certification->imagesable);
		}
		
		return $sum;
	}
	
	/**
	 * @return int
	 */
	public function getNumImagesSpecialityAttribute()
	{
		$sum = 0;
		foreach ( $this->specialities as $speciality )
		{
			$sum += count($speciality->imagesable);
		}
		
		return $sum;
	}
	
	/**
	 * @return int
	 */
	public function getNumImagesProfessionalLicensesAttribute()
	{
		$sum = 0;
		foreach ( $this->professionalLicenses as $professionalLicense )
		{
			$sum += count($professionalLicense->imagesable);
		}
		
		return $sum;
	}
	
	/**
	 * @return int
	 */
	public function getNumImagesDisabilitiesAttribute()
	{
		$sum = 0;
		foreach ( $this->disabilities as $disability )
		{
			$sum += count($disability->imagesable);
		}
		
		return $sum;
	}
	
	/**
	 * @return int
	 */
	public function getNumImagesDiseasesAttribute()
	{
		$sum = 0;
		foreach ( $this->diseases as $disease )
		{
			$sum += count($disease->imagesable);
		}
		
		return $sum;
	}
	
	/**
	 * @return int
	 */
	public function getNumImagesExamsAttribute()
	{
		$sum = 0;
		foreach ( $this->exams as $exam )
		{
			$sum += count($exam->imagesable);
		}
		
		return $sum;
	}
	
	/**
	 * @return int
	 */
	public function getNumImagesFamilyResponsabilitiesAttribute()
	{
		$sum = 0;
		foreach ( $this->familyResponsabilities as $family_responsability )
		{
			$sum += count($family_responsability->imagesable);
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
}