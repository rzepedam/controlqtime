<?php

namespace Controlqtime\Core\Entities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Employee extends Eloquent
{
    protected $fillable = [
        'male_surname', 'female_surname', 'first_name', 'second_name', 'full_name', 'rut', 'birthday',
        'nationality_id', 'gender_id', 'address', 'commune_id', 'email', 'phone1', 'phone2', 'company_id',
        'code', 'state'
    ];

    protected $dates = [
        'birthday'
    ];

    /*
     * Relationships
     */
    
    public function company() {
        return $this->belongsTo(Company::class);
    }
    
    public function nationality() {
        return $this->belongsTo(Nationality::class);
    }

    public function gender() {
        return $this->belongsTo(Gender::class);
    }
    
    public function commune() {
        return $this->belongsTo(Commune::class);
    }
    
    public function familyRelationships() {
        return $this->hasMany(FamilyRelationship::class);
    }
    
    public function studies() {
        return $this->hasMany(Study::class);
    }
    
    public function certifications() {
        return $this->hasMany(Certification::class);
    }
    
    public function specialities() {
        return $this->hasMany(Speciality::class);
    }
    
    public function professionalLicenses(){
        return $this->hasMany(ProfessionalLicense::class);
    }
    
    public function disabilities() {
        return $this->hasMany(Disability::class);
    }
    
    public function diseases() {
        return $this->hasMany(Disease::class);
    }

    public function exams() {
        return $this->hasMany(Exam::class);
    }

    public function familyResponsabilities() {
        return $this->hasMany(FamilyResponsability::class);
    }

    /*public function dailyAssistances() {
        return $this->hasMany('Controlqtime\DailyAssistance');
    }*/

    /*
     * Mutators
     */
    
    /**
     * @param string $value
     */
    public function setMaleSurnameAttribute($value) {
        $this->attributes['male_surname'] = ucfirst(mb_strtolower($value, 'utf-8'));
    }


    /**
     * @param string $value
     */
    public function setFemaleSurnameAttribute($value) {
        $this->attributes['female_surname'] = ucfirst(mb_strtolower($value, 'utf-8'));
    }


    /**
     * @param string $value
     */
    public function setFirstNameAttribute($value) {
        $this->attributes['first_name'] = ucfirst(mb_strtolower($value, 'utf-8'));
    }


    /**
     * @param string $value
     */
    public function setSecondNameAttribute($value) {
        $this->attributes['second_name'] = ucfirst(mb_strtolower($value, 'utf-8'));
    }


    /**
     * @param string $value
     */
    public function setEmailAttribute($value) {
        $this->attributes['email'] = strtolower($value);
    }
    
    
    /**
     * @param $value
     */
    public function setBirthdayAttribute($value) {
        $this->attributes['birthday'] = Carbon::createFromFormat('d-m-Y', $value);
    }

    /*
     * Accesors
     */

    /**
     * @return mixed
     */
    public function getNumFamilyRelationshipAttribute() {
        return count($this->familyRelationships);
    }
    
}
