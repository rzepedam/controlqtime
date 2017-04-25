<?php

namespace Controlqtime\Core\Entities;

use Carbon\Carbon;
use Controlqtime\Core\Helpers\FormatField;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;
use Jenssegers\Date\Date;

class Company extends Eloquent
{
    use SoftDeletes;

    /**
     * @var array
     */
    protected $fillable = [
        'type_company_id', 'rut', 'firm_name', 'gyre', 'start_act', 'muni_license', 'email_company',
    ];

    /**
     * @var array
     */
    protected $dates = [
        'start_act', 'deleted_at',
    ];

    /**
     * @param $query
     *
     * @return enable Companies
     */
    public function scopeEnabled($query)
    {
        return $query->whereState('enable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function imageable()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function address()
    {
        return $this->morphOne(Address::class, 'addressable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function legalRepresentative()
    {
        return $this->hasOne(LegalRepresentative::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function vehicles()
    {
        return $this->hasMany(Vehicle::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function typeCompany()
    {
        return $this->belongsTo(TypeCompany::class)
            ->withTrashed();
    }

    /**
     * @param string $value format 123.456.789-k
     */
    public function setRutAttribute($value)
    {
        $this->attributes['rut'] = str_replace('.', '', $value);
    }

    /**
     * @param string $value
     */
    public function setFirmNameAttribute($value)
    {
        $this->attributes['firm_name'] = ucfirst($value);
    }

    /**
     * @param string $value
     */
    public function setGyreAttribute($value)
    {
        $this->attributes['gyre'] = ucfirst(mb_strtolower($value, 'utf-8'));
    }

    /**
     * @param string $value
     */
    public function setEmailCompanyAttribute($value)
    {
        $this->attributes['email_company'] = strtolower($value);
    }

    /**
     * @param string $value
     */
    public function setStartActAttribute($value)
    {
        $this->attributes['start_act'] = Carbon::createFromFormat('d-m-Y', $value);
    }

    /**
     * @param string $value format 123456789-k
     *
     * @return string 123.456.789-k
     */
    public function getRutAttribute($value)
    {
        return FormatField::rut($value);
    }

    /**
     * @param $value '1980-09-19'
     *
     * @return string '19-09-1980'
     */
    public function getStartActAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }

    /**
     * @return string 'domingo 11 diciembre 2016'
     */
    public function getStartActToSpanishFormatAttribute()
    {
        return Date::parse($this->start_act)->format('l j F Y');
    }

    /**
     * @return string 'domingo 11 diciembre 2016 20:50:18'
     */
    public function getCreatedAtToSpanishFormatAttribute()
    {
        return Date::parse($this->created_at)->format('l j F Y H:i:s');
    }

    /**
     * @return all images related with Rol
     */
    public function getImagesRolAttribute()
    {
        return $this->imageable()->where('path', 'like', '%Rol%')->get();
    }

    /**
     * @return all images related with Patent
     */
    public function getImagesPatentAttribute()
    {
        return $this->imageable()->where('path', 'like', '%Patent%')->get();
    }

    /**
     * @return all images related with Carnet Legal Representative
     */
    public function getImagesCarnetAttribute()
    {
        return $this->imageable()->where('path', 'like', '%Carnet%')->get();
    }

    /**
     * @return int
     */
    public function getNumImagesRolAttribute()
    {
        return $this->imageable()->where('path', 'like', '%Rol%')->count();
    }

    /**
     * @return int
     */
    public function getNumImagesPatentAttribute()
    {
        return $this->imageable()->where('path', 'like', '%Patent%')->count();
    }

    /**
     * @return int
     */
    public function getNumImagesCarnetAttribute()
    {
        return $this->imageable()->where('path', 'like', '%Carnet%')->count();
    }

    /**
     * @return int
     */
    public function getNumTotalImagesAttribute()
    {
        return $this->getNumImagesRolAttribute() + $this->getNumImagesPatentAttribute() + $this->getNumImagesCarnetAttribute();
    }
}
