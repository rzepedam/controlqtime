<?php

namespace Controlqtime\Core\Entities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Contract extends Eloquent
{
	/**
	 * @var array
	 */
	protected $fillable = array(
		'company_id', 'employee_id', 'position_id', 'area_id', 'num_hour_id',
		'periodicity_hour_id', 'day_trip_id', 'init_morning', 'end_morning', 'init_afternoon',
		'end_afternoon', 'periodicity_work_id', 'salary', 'mobilization', 'collation',
		'gratification_id', 'type_contract_id', 'pension_id', 'forecast_id'
	);

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function company() {
		return $this->belongsTo(Company::class);
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function employee() {
		return $this->belongsTo(Employee::class);
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function position() {
		return $this->belongsTo(Position::class);
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function area() {
		return $this->belongsTo(Area::class);
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function numHour() {
		return $this->belongsTo(NumHour::class);
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function periodicityHour() {
		return $this->belongsTo(Periodicity::class, 'periodicity_hour_id');
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function dayTrip() {
		return $this->belongsTo(DayTrip::class);
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function periodicityWork() {
		return $this->belongsTo(Periodicity::class, 'periodicity_work_id');
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function gratification() {
		return $this->belongsTo(Gratification::class);
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function typeContract() {
		return $this->belongsTo(TypeContract::class);
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function pension() {
		return $this->belongsTo(Pension::class);
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function forecast() {
		return $this->belongsTo(Forecast::class);
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
	public function termsAndObligatories() {
		return $this->belongsToMany(TermAndObligatory::class);
	}

	/**
	 * @param datetime($value) 2016-01-01 00:00:00
	 * @return string format('d-m-Y H:i:s')
	 */
	public function getCreatedAtAttribute($value) {
		return $this->attributes['created_at'] = Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('d-m-Y H:i:s');
	}

}
