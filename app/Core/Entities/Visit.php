<?php

namespace Controlqtime\Core\Entities;

use Carbon\Carbon;
use Controlqtime\Core\Helpers\FormatField;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Jenssegers\Date\Date;
use UrlSigner;

class Visit extends Eloquent
{
    /**
     * @var array
     */
    protected $fillable = [
        'user_id', 'type_visit_id', 'employee_id', 'is_walking', 'rut', 'male_surname', 'female_surname',
        'first_name', 'second_name', 'position', 'company', 'phone', 'email', 'date', 'hour',
        'start_date', 'end_date', 'obs', 'url', 'key',
    ];

    /**
     * @var array
     */
    protected $dates = [
        'startDate', 'endDate', 'date',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
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
    public function typeVisit()
    {
        return $this->belongsTo(TypeVisit::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function formVisit()
    {
        return $this->hasOne(FormVisit::class);
    }

    /**
     * @param $value '0 or 1'
     */
    public function setIsWalkingAttribute($value)
    {
        $this->attributes['is_walking'] = ($value === '1') ? true : false;
    }

    /**
     * @param $value '15.982.092-2'
     */
    public function setRutAttribute($value)
    {
        $this->attributes['rut'] = str_replace('.', '', $value);
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
     * @param string $value
     */
    public function setPositionAttribute($value)
    {
        $this->attributes['position'] = ucfirst(mb_strtolower($value, 'utf-8'));
    }

    /**
     * @param string $value
     */
    public function setCompanyAttribute($value)
    {
        $this->attributes['company'] = ucfirst(mb_strtolower($value, 'utf-8'));
    }

    /**
     * @param email $value
     */
    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = strtolower($value);
    }

    /**
     * @param string '01-01-2010'
     */
    public function setDateAttribute($value)
    {
        $this->attributes['date'] = Carbon::parse($value)->format('Y-m-d');
    }

    /**
     * @param string '12:45'
     */
    public function setHourAttribute($value)
    {
        $this->attributes['hour'] = str_replace(':', '', $value);
    }

    /**
     * @param string '01-01-2010'
     */
    public function setStartDateAttribute($value)
    {
        $this->attributes['start_date'] = Carbon::parse($value)->format('Y-m-d');
    }

    /**
     * @param string '01-01-2010'
     */
    public function setEndDateAttribute($value)
    {
        $this->attributes['end_date'] = Carbon::parse($value)->format('Y-m-d');
    }

    /**
     * @param text $value
     */
    public function setObsAttribute($value)
    {
        $this->attributes['obs'] = ucfirst($value);
    }

    /**
     * @param string $value
     */
    public function setUrlAttribute($value)
    {
        is_null($this->start_date) ? $expired = Carbon::parse($this->date)->format('Y-m-d') . ' ' . $this->hour
            : $expired = $this->start_date . ' 00:00:00';

        $this->attributes['url'] = UrlSigner::sign(env('APP_URL').$value, Carbon::parse($expired));
    }

    /**
     * @return string
     */
    public function getTextIsWalkingAttribute()
    {
        return $this->getOriginal('is_walking') ? 'A pie' : 'En vehículo';
    }

    /**
     * @param $value '12345678-9'
     *
     * @return mixed '12.345.678-9'
     */
    public function getRutAttribute($value)
    {
        return FormatField::rut($value);
    }

    /**
     * @return string
     */
    public function getFullNameAttribute()
    {
        return $this->first_name.' '.$this->second_name.' '.$this->male_surname.' '.$this->female_surname;
    }

    /**
     * @param string $value 1100
     *
     * @return string 11:00
     */
    public function getHourAttribute($value)
    {
        return implode(':', str_split($value, 2));
    }

    /**
     * @return string Sábado 13 octubre a las 14:30
     */
    public function getDateMoreHourAttribute()
    {
        if ($this->type_visit_id === 1 || $this->type_visit_id === 5) {
            return ucfirst(Date::parse($this->date)->format('l j F Y')).' a las '.$this->hour;
        }

        return ucfirst(Date::parse($this->start_date)->format('l j F Y')).' a '.ucfirst(Date::parse($this->end_date)->format('l j F Y'));
    }

    /**
     * @param  date->format('Y-m-d')
     *
     * @return date->format('d-m-Y')
     */
    public function getDateAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }

    /**
     * @return string 'Lunes 12 Diciembre 2016'
     */
    public function getCreatedAtToSpanishFormatAttribute()
    {
        return ucfirst(Date::parse($this->created_at)->format('l j F Y H:i:s'));
    }

    /**
     * @return images Company
     */
    public function getImagesCompanyAttribute()
    {
        return $this->imageable()->where('path', 'like', '%Company%')->get();
    }

    /**
     * @return images Visa
     */
    public function getImagesVisaAttribute()
    {
        return $this->imageable()->where('path', 'like', '%Visa%')->get();
    }

    /**
     * @return images Induction
     */
    public function getImagesInductionAttribute()
    {
        return $this->imageable()->where('path', 'like', '%Induction%')->get();
    }

    /**
     * @return images Insurrance
     */
    public function getImagesInsurranceAttribute()
    {
        return $this->imageable()->where('path', 'like', '%Insurrance%')->get();
    }

    /**
     * @return images Forecast
     */
    public function getImagesForecastAttribute()
    {
        return $this->imageable()->where('path', 'like', '%Forecast%')->get();
    }
}
