<?php

namespace Controlqtime\Core\Entities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Certification extends Eloquent
{
	use SoftDeletes;
	
    /**
     * @var array
     */
    protected $fillable = [
        'type_certification_id', 'institution_certification_id', 'emission_certification', 'expired_certification'
    ];

    /**
     * @var array
     */
    protected $dates = [
        'emission_certification', 'expired_certification', 'deleted_at'
    ];
	
	
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
    public function typeCertification()
    {
        return $this->belongsTo(TypeCertification::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function institution()
    {
        return $this->belongsTo(Institution::class, 'institution_certification_id');
    }

    /**
     * @param string $value (01-01-2010)
     */
    public function setEmissionCertificationAttribute($value)
    {
        $this->attributes['emission_certification'] = Carbon::createFromFormat('d-m-Y', $value);
    }

    /**
     * @param string $value (01-01-2010)
     */
    public function setExpiredCertificationAttribute($value)
    {
        $this->attributes['expired_certification'] = Carbon::createFromFormat('d-m-Y', $value);
    }
    
}
