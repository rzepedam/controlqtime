<?php

namespace Controlqtime\Core\Entities;

use Controlqtime\Core\Helpers\FormatField;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model as Eloquent;

class DetailVehicle extends Eloquent
{
	use SoftDeletes;
	
	/**
	 * @var array
	 */
	protected $fillable = [
		'vehicle_id', 'fuel_id', 'color', 'num_chasis', 'num_motor', 'km', 'engine_cubic', 'weight', 'tag', 'obs'
	];
	
    /**
     * @var bool
     */
    public $timestamps = false;
	
	/**
	 * @var array
	 */
	protected $dates = [
		'deleted_at'
	];
	

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasOne
	 */
	public function detailBus()
    {
        return $this->hasOne(DetailBus::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function fuel()
    {
        return $this->belongsTo(Fuel::class);
    }
    
    
    /**
     * @param string $value
     */
    public function setColorAttribute($value)
    {
        $this->attributes['color'] = ucfirst(mb_strtolower($value, 'utf-8'));
    }

    /**
     * @param string $value
     */
    public function setNumChasisAttribute($value)
    {
        $this->attributes['num_chasis'] = strtoupper($value);
    }
	
	/**
	 * @param string $value
	 */
	public function setTagAttribute($value)
    {
        $this->attributes['tag'] = strtoupper($value);
    }
    
    /**
     * @param string $value
     */
    public function setNumMotorAttribute($value)
    {
        $this->attributes['num_motor'] = strtoupper($value);
    }

    /**
     * @param string $value (15000)
     *
     * @return string (15.000)
     */
    public function getKmAttribute($value)
    {
        return FormatField::decimalNumber($value);
    }

    /**
     * @param $value (1600)
     *
     * @return string (1.600)
     */
    public function getEngineCubicAttribute($value)
    {
        return FormatField::decimalNumber($value);
    }

    /**
     * @param string $value (9500)
     *
     * @return string (9.500)
     */
    public function getWeightAttribute($value)
    {
        return FormatField::decimalNumber($value);
    }
}
