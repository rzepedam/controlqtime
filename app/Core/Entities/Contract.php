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
	public function employee() {
		return $this->belongsTo(Employee::class);
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function company() {
		return $this->belongsTo(Company::class);
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
	public function terms_and_obligatories() {
		return $this->belongsToMany(TermAndObligatory::class);
	}

	/**
	 * @param datetime $date
	 * @return string format('d-m-Y H:i:s')
	 */
	public function getCreatedAtAttribute($date)
	{
		return $this->attributes['created_at'] = Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d-m-Y H:i:s');
	}

}
