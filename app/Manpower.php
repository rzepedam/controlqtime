<?php

namespace Controlqtime;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;


class Manpower extends Model
{
    protected $fillable = [
        'male_surname', 'female_surname', 'first_name', 'second_name', 'full_name', 'rut', 'birthday', 'nationality_id',
        'gender_id', 'address', 'commune_id', 'email', 'phone1', 'phone2', 'forecast_id', 'mutuality_id', 'pension_id',
        'company_id', 'rating_id', 'area_id', 'code_internal', 'status'
    ];

    protected $dates = [
        'birthday'
    ];
    
    public function scopeName($query, $name)
    {
        $not_space_name = trim($name);

        if(!empty($not_space_name)) {
            $query->where("full_name", "LIKE", "%$not_space_name%");
        }
    }

    /*
     * Relationships
     */
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company() {
        return $this->belongsTo('Controlqtime\Company');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function nationality() {
        return $this->belongsTo('Controlqtime\Country');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function gender() {
        return $this->belongsTo('Controlqtime\Gender');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function commune() {
        return $this->belongsTo('Controlqtime\Commune');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function forecast() {
        return $this->belongsTo('Controlqtime\Forecast');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function mutuality() {
        return $this->belongsTo('Controlqtime\Mutuality');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pension() {
        return $this->belongsTo('Controlqtime\Pension');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function rating() {
        return $this->belongsTo('Controlqtime\Rating');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function area() {
        return $this->belongsTo('Controlqtime\Area');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function familyRelationships() {
        return $this->hasMany('Controlqtime\FamilyRelationship');
    }
    
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function studies() {
        return $this->hasMany('Controlqtime\Study');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function certifications() {
        return $this->hasMany('Controlqtime\Certification');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function specialities() {
        return $this->hasMany('Controlqtime\Speciality');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function professionalLicenses(){
        return $this->hasMany('Controlqtime\ProfessionalLicense');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function disabilities() {
        return $this->hasMany('Controlqtime\Disability');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function diseases() {
        return $this->hasMany('Controlqtime\Disease');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function exams() {
        return $this->hasMany('Controlqtime\Exam');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function familyResponsabilities() {
        return $this->hasMany('Controlqtime\FamilyResponsability');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function dailyAssistances() {
        return $this->hasMany('Controlqtime\DailyAssistance');
    }

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
