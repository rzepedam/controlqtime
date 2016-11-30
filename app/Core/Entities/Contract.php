<?php

namespace Controlqtime\Core\Entities;

use Carbon\Carbon;
use Controlqtime\Core\Helpers\FormatField;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Contract extends Eloquent
{
	use SoftDeletes;
	
    /**
     * @var array
     */
    protected $fillable = [
        'company_id', 'employee_id', 'position_id', 'area_id', 'num_hour_id',
        'periodicity_hour_id', 'day_trip_id', 'init_morning', 'end_morning', 'init_afternoon',
        'end_afternoon', 'periodicity_work_id', 'salary', 'mobilization', 'collation',
        'gratification_id', 'type_contract_id', 'expires_at'
    ];
	
	/**
	 * @var array
	 */
	protected $cascadeDeletes = [
		'termsAndObligatories'
	];
	
	/**
	 * @var array
	 */
	protected $dates = [
		'expires_at', 'deleted_at'
	];
	
	
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
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function numHour()
    {
        return $this->belongsTo(NumHour::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function periodicityHour()
    {
        return $this->belongsTo(Periodicity::class, 'periodicity_hour_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function dayTrip()
    {
        return $this->belongsTo(DayTrip::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function periodicityWork()
    {
        return $this->belongsTo(Periodicity::class, 'periodicity_work_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function gratification()
    {
        return $this->belongsTo(Gratification::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function typeContract()
    {
        return $this->belongsTo(TypeContract::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function termsAndObligatories()
    {
        return $this->belongsToMany(TermAndObligatory::class);
    }
	
    
	/**
	 * @param string $value (09:00)
	 */
	public function setInitMorningAttribute($value)
    {
        $this->attributes['init_morning'] = str_replace(":", "", $value);
    }
	
	/**
	 * @param string $value (13:00)
	 */
	public function setEndMorningAttribute($value)
	{
		$this->attributes['end_morning'] = str_replace(":", "", $value);
	}
	
	/**
	 * @param string $value (14:00)
	 */
	public function setInitAfternoonAttribute($value)
	{
		$this->attributes['init_afternoon'] = str_replace(":", "", $value);
	}
	
	/**
	 * @param string $value (19:00)
	 */
	public function setEndAfternoonAttribute($value)
	{
		$this->attributes['end_afternoon'] = str_replace(":", "", $value);
	}
	
	
	/**
	 * @param $value (0900)
	 *
	 * @return string (09:00)
	 */
	public function getInitMorningAttribute($value)
	{
		return implode(':', str_split($value, 2));
	}
	
	/**
	 * @param $value (1300)
	 *
	 * @return string (13:00)
	 */
	public function getEndMorningAttribute($value)
	{
		return implode(':', str_split($value, 2));
	}
	
	/**
	 * @param $value (1400)
	 *
	 * @return string (14:00)
	 */
	public function getInitAfternoonAttribute($value)
	{
		return implode(':', str_split($value, 2));
	}
	
	/**
	 * @param $value (1900)
	 *
	 * @return string (19:00)
	 */
	public function getEndAfternoonAttribute($value)
	{
		return implode(':', str_split($value, 2));
	}
	
    /**
     * @param date $value (2016-10-01 10:22:46)
     *
     * @return string (01-10-2016)
     */
    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }

    /**
     * @param $value (250000)
     *
     * @return string ($ 250.000) for autoNumeric plugin
     */
    public function getSalaryAttribute($value)
    {
        return FormatField::decimalNumber($value);
    }

    /**
     * @param $value (15000)
     *
     * @return string ($ 15.000) for autoNumeric plugin
     */
    public function getMobilizationAttribute($value)
    {
        return FormatField::decimalNumber($value);
    }

    /**
     * @param $value (15000)
     *
     * @return string ($ 15.000) for autoNumeric plugin
     */
    public function getCollationAttribute($value)
    {
        return FormatField::decimalNumber($value);
    }
    
}
