<?php

namespace Controlqtime\Core\Entities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model as Eloquent;

class DateDocumentationVehicle extends Eloquent
{
    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = [
        'emission_padron', 'expiration_padron', 'emission_insurance', 'expiration_insurance',
        'emission_permission', 'expiration_permission'
    ];

    /**
     * @var array
     */
    protected $dates = [
        'emission_padron', 'expiration_padron', 'emission_insurance',
        'expiration_insurance', 'emission_permission', 'expiration_permission'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    /**
     * @param string $value (01-10-2016)
     */
    public function setEmissionPadronAttribute($value)
    {
        $this->attributes['emission_padron'] = Carbon::createFromFormat('d-m-Y', $value);
    }

    /**
     * @param string $value (01-10-2016)
     */
    public function setExpirationPadronAttribute($value)
    {
        $this->attributes['expiration_padron'] = Carbon::createFromFormat('d-m-Y', $value);
    }

    /**
     * @param string $value (01-10-2016)
     */
    public function setEmissionInsuranceAttribute($value)
    {
        $this->attributes['emission_insurance'] = Carbon::createFromFormat('d-m-Y', $value);
    }

    /**
     * @param string $value (01-10-2016)
     */
    public function setExpirationInsuranceAttribute($value)
    {
        $this->attributes['expiration_insurance'] = Carbon::createFromFormat('d-m-Y', $value);
    }

    /**
     * @param string $value (01-10-2016)
     */
    public function setEmissionPermissionAttribute($value)
    {
        $this->attributes['emission_permission'] = Carbon::createFromFormat('d-m-Y', $value);
    }

    /**
     * @param string $value (01-10-2016)
     */
    public function setExpirationPermissionAttribute($value)
    {
        $this->attributes['expiration_permission'] = Carbon::createFromFormat('d-m-Y', $value);
    }

    /**
     * @param date $value (2016-10-01)
     *
     * @return string (01-10-2016)
     */
    public function getEmissionPadronAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }

    /**
     * @param date $value (2016-10-01)
     *
     * @return string (01-10-2016)
     */
    public function getExpirationPadronAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }

    /**
     * @param date $value (2016-10-01)
     *
     * @return string (01-10-2016)
     */
    public function getEmissionInsuranceAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }

    /**
     * @param date $value (2016-10-01)
     *
     * @return string (01-10-2016)
     */
    public function getExpirationInsuranceAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }

    /**
     * @param date $value (2016-10-01)
     *
     * @return string (01-10-2016)
     */
    public function getEmissionPermissionAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }

    /**
     * @param date $value (2016-10-01)
     *
     * @return string (01-10-2016)
     */
    public function getExpirationPermissionAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }
}
