<?php

namespace Controlqtime\Core\Entities;

use Carbon\Carbon;
use Controlqtime\Core\Helpers\FormatField;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Employee extends Eloquent
{
	/**
	 * @var array
	 */
	protected $fillable = [
		'user_id', 'male_surname', 'female_surname', 'first_name', 'second_name', 'full_name', 'rut', 'birthday',
		'nationality_id', 'marital_status_id', 'forecast_id', 'pension_id', 'gender_id', 'email_employee', 'state'
	];
	
	/**
	 * @var array
	 */
	protected $dates = [
		'birthday'
	];
	
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasOne
	 */
	public function address()
	{
	    return $this->morphOne(Address::class, 'addressable');
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function certifications()
	{
		return $this->hasMany(Certification::class);
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function contactEmployees()
	{
		return $this->hasMany(ContactEmployee::class);
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasOne
	 */
	public function contract()
	{
		return $this->hasOne(Contract::class);
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function disabilities()
	{
		return $this->hasMany(Disability::class);
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function diseases()
	{
		return $this->hasMany(Disease::class);
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function exams()
	{
		return $this->hasMany(Exam::class);
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function familyRelationships()
	{
		return $this->hasMany(FamilyRelationship::class);
	}
	
	public function familyResponsabilities()
	{
		return $this->hasMany(FamilyResponsability::class);
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function gender()
	{
		return $this->belongsTo(Gender::class);
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
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function imageIdentityCardEmployees()
	{
		return $this->hasMany(ImageIdentityCardEmployee::class);
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function imageCriminalRecordEmployees()
	{
		return $this->hasMany(ImageCriminalRecordEmployee::class);
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function imageHealthCertificateEmployees()
	{
		return $this->hasMany(ImageHealthCertificateEmployee::class);
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function imagePensionCertificateEmployees()
	{
		return $this->hasMany(ImagePensionCertificateEmployee::class);
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
	 */
	public function imageCertificationEmployees()
	{
		return $this->hasManyThrough(ImageCertificationEmployee::class, Certification::class);
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
	 */
	public function imageDisabilityEmployees()
	{
		return $this->hasManyThrough(ImageDisabilityEmployee::class, Disability::class);
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
	 */
	public function imageDiseaseEmployees()
	{
		return $this->hasManyThrough(ImageDiseaseEmployee::class, Disease::class);
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
	 */
	public function imageExamEmployees()
	{
		return $this->hasManyThrough(ImageExamEmployee::class, Exam::class);
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
	 */
	public function imageFamilyResponsabilityEmployees()
	{
		return $this->hasManyThrough(ImageFamilyResponsabilityEmployee::class, FamilyResponsability::class);
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
	 */
	public function imageProfessionalLicenses()
	{
		return $this->hasManyThrough(ImageProfessionalLicenseEmployee::class, ProfessionalLicense::class);
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
	 */
	public function imageSpecialityEmployees()
	{
		return $this->hasManyThrough(ImageSpecialityEmployee::class, Speciality::class);
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function nationality()
	{
		return $this->belongsTo(Nationality::class);
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function professionalLicenses()
	{
		return $this->hasMany(ProfessionalLicense::class);
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function specialities()
	{
		return $this->hasMany(Speciality::class);
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function studies()
	{
		return $this->hasMany(Study::class);
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function user()
	{
        return $this->belongsTo(User::class);
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
	
}
