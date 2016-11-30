<?php

namespace Controlqtime\Core\Entities;

use Carbon\Carbon;
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
		'nationality_id', 'marital_status_id', 'forecast_id', 'pension_id', 'gender_id', 'email_employee', 'state'
	];
	
	/**
	 * @var array
	 */
	protected $cascadeDeletes = [
		'contactEmployees', 'familyRelationships', 'studies', 'certifications', 'specialities',
		'professionalLicenses', 'disabilities', 'diseases', 'exams', 'familyResponsabilities',
		'user', 'address', 'contract', 'accessControls', 'dailyAssistances', 'imagesable'
	];
	
	/**
	 * @var array
	 */
	protected $dates = [
		'birthday', 'deleted_at'
	];
	
	
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
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
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
		foreach ($this->certifications as $certification)
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
		foreach ($this->specialities as $speciality)
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
		foreach ($this->professionalLicenses as $professionalLicense)
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
		foreach ($this->disabilities as $disability)
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
		foreach ($this->diseases as $disease)
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
		foreach ($this->exams as $exam)
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
		foreach ($this->familyResponsabilities as $family_responsability)
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