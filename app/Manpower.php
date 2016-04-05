<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Manpower extends Model
{
    protected $fillable = [
        'male_surname', 'female_surname', 'first_name', 'second_name', 'full_name', 'rut', 'birthday', 'nationality_id', 'gender_id', 'address', 'commune_id', 'email', 'phone1', 'phone2', 'forecast_id', 'mutuality_id', 'pension_id', 'company_id', 'rating_id'
    ];
    
    public function scopeName($query, $name)
    {
        $not_space_name = trim($name);

        if(!empty($not_space_name)) {
            $query->where("full_name", "LIKE", "%$not_space_name%");
        }
    }

    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company() {
        return $this->belongsTo('App\Company');
    }


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


    /**
     * @return string
     */
    /*public function getFullNameAttribute() {
        return $this->first_name . " " . $this->second_name . " " . $this->male_surname . " " . $this->female_surname;
    }*/
}
