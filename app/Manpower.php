<?php

namespace App;

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
        return $this->belongsTo('App\Company');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function nationality() {
        return $this->belongsTo('App\Country');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function gender() {
        return $this->belongsTo('App\Gender');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function commune() {
        return $this->belongsTo('App\Commune');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function forecast() {
        return $this->belongsTo('App\Forecast');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function mutuality() {
        return $this->belongsTo('App\Mutuality');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pension() {
        return $this->belongsTo('App\Pension');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function rating() {
        return $this->belongsTo('App\Rating');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function area() {
        return $this->belongsTo('App\Area');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function familyRelationships() {
        return $this->hasMany('App\FamilyRelationship');
    }
    
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function studies() {
        return $this->hasMany('App\Study');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function certifications() {
        return $this->hasMany('App\Certification');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function specialities() {
        return $this->hasMany('App\Speciality');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function professionalLicenses(){
        return $this->hasMany('App\ProfessionalLicense');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function disabilities() {
        return $this->hasMany('App\Disability');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function diseases() {
        return $this->hasMany('App\Disease');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function exams() {
        return $this->hasMany('App\Exam');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function familyResponsabilities() {
        return $this->hasMany('App\FamilyResponsability');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function dailyAssistances() {
        return $this->hasMany('App\DailyAssistance');
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
