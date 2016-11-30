<?php

namespace Controlqtime\Core\Entities;

use Carbon\Carbon;
use Controlqtime\Core\Helpers\FormatField;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model as Eloquent;

class LegalRepresentative extends Eloquent
{
	use SoftDeletes;
	
    /**
     * @var array
     */
    protected $fillable = [
        'company_id', 'male_surname', 'female_surname', 'first_name', 'second_name', 'rut_representative',
        'birthday', 'nationality_id', 'email_representative',
    ];
	
	protected $cascadeDeletes = [
		'address'
	];

    /**
     * @var array
     */
    protected $dates = [
        'birthday', 'deleted_at'
    ];
	
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\MorphOne
	 */
	public function address()
	{
        return $this->morphOne(Address::class, 'addressable');
	}
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function nationality()
    {
        return $this->belongsTo(Nationality::class);
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
        $this->attributes['second_name'] = ucfirst(mb_strtolower($value, 'utf-8'));
    }

    /**
     * @param string $value
     */
    public function setEmailAttribute($value)
    {
        $this->attributes['email_representative'] = strtolower($value);
    }

    /**
     * @param string $value format 12.345.678-9
     */
    public function setRutRepresentativeAttribute($value)
    {
        $this->attributes['rut_representative'] = str_replace('.', '', $value);
    }

    /**
     * @param string $value (01-01-2010)
     */
    public function setBirthdayAttribute($value)
    {
        $this->attributes['birthday'] = Carbon::createFromFormat('d-m-Y', $value);
    }

    /**
     * @return string
     */
    public function getFullNameAttribute()
    {
        return $this->first_name . " " . $this->second_name . " " . $this->male_surname . " " . $this->female_surname;
    }

    /**
     * @param string $value format 12345678-9
     *
     * @return string 12.345.678-9
     */
    public function getRutRepresentativeAttribute($value)
    {
        return FormatField::rut($value);
    }
    
}
