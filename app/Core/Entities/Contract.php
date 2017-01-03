<?php

namespace Controlqtime\Core\Entities;

use Carbon\Carbon;
use Jenssegers\Date\Date;
use Illuminate\Support\Facades\Config;
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
		'periodicity_id', 'day_trip_id', 'init_morning', 'end_morning', 'init_afternoon',
		'end_afternoon', 'salary', 'mobilization', 'collation', 'type_contract_id',
		'forecast_id', 'pension_id', 'expires_at'
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
		return $this->belongsTo(NumHour::class)
			->withTrashed();
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function periodicity()
	{
		return $this->belongsTo(Periodicity::class)
			->withTrashed();
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
	public function pension()
	{
		return $this->belongsTo(Pension::class);
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function forecast()
	{
	    return $this->belongsTo(Forecast::class);
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
	
	public function getCreatedAtToSpanishFormatAttribute()
	{
		return Date::parse($this->created_at)->format('l j F Y');
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
	
	/**
	 * @param $value '250000'
	 *
	 * @return string '250.000'
	 */
	public function salaryWithPoints($value)
	{
		return FormatField::decimalNumber($value);
	}
	
	/**
	 * @return string '716.909'
	 */
	public function gratification()
	{
		$gratification = (Config::get('constants.sueldo_minimo') * 4.75) / 12;
		
		return FormatField::decimalNumber($gratification);
	}
	
	/**
	 * @return string '550.500'
	 */
	public function totalImponible()
	{
		$totalImponible = $this->salary + $this->gratification();
		
		return $totalImponible;
	}
	
	/**
	 * @return string '550.500'
	 */
	public function asignacionFamiliar()
	{
		switch ( $this->salary )
		{
			case ($this->salary <= 270196):
				return Config::get('constants.familyAllowance')[0] * $this->employee->num_family_responsabilities;
				break;
			
			case ($this->salary > 270196 && $this->salary <= 394651):
				return Config::get('constants.familyAllowance')[1] * $this->employee->num_family_responsabilities;
				break;
			
			case ($this->salary > 394651 && $this->salary <= 615521):
				return Config::get('constants.familyAllowance')[2] * $this->employee->num_family_responsabilities;
				break;
			
			default:
				return 0;
				break;
		}
	}
	
	/**
	 * @return string '590.300'
	 */
	public function totalHaber()
	{
		$totalHaber = $this->totalImponible() + $this->asignacionFamiliar() + $this->mobilization + $this->collation;
		
		return $totalHaber;
	}
	
	/**
	 * @return string '590.300'
	 */
	public function totalPension()
	{
		$totalPension = $this->totalImponible() * ($this->pension->com + 0.10);
		
		return $totalPension;
	}
	
	/**
	 * @return string '590.300'
	 */
	public function totalForecast()
	{
		$totalForecast = $this->totalImponible() * 0.07;
		
		return $totalForecast;
	}
	
	/**
	 * @return string '129.800'
	 */
	public function descuentosAfectos()
	{
		$descuentosAfectos = $this->totalPension() + $this->totalForecast();
		
		return $descuentosAfectos;
	}
	
	/**
	 * @return string '186.000'
	 */
	public function baseTributable()
	{
		$baseTributable = $this->totalImponible() - $this->descuentosAfectos();
		
		return $baseTributable;
	}
	
	/**
	 * @return string '105770'
	 */
	public function valorImpuestoSegundaCategoria()
	{
		switch ( $this->salary )
		{
			case ($this->salary <= 624091):
				return ($this->salary * Config::get('constants.impuestoSegundaCategoria')[0]);
				break;
			
			case ($this->salary > 624091 && $this->salary <= 1386870):
				return ($this->salary * Config::get('constants.impuestoSegundaCategoria')[1]);
				break;
			
			case ($this->salary > 1386870 && $this->salary <= 2311450):
				return ($this->salary * Config::get('constants.impuestoSegundaCategoria')[2]);
				break;
			
			case ($this->salary > 2311450 && $this->salary <= 3236030):
				return ($this->salary * Config::get('constants.impuestoSegundaCategoria')[3]);
				break;
			
			case ($this->salary > 3236030 && $this->salary <= 4160610):
				return ($this->salary * Config::get('constants.impuestoSegundaCategoria')[4]);
				break;
			
			case ($this->salary > 4160610 && $this->salary <= 5547480):
				return ($this->salary * Config::get('constants.impuestoSegundaCategoria')[5]);
				break;
			
			case ($this->salary > 5547480):
				return ($this->salary * Config::get('constants.impuestoSegundaCategoria')[6]);
				break;
		}
	}
	
	/**
	 * @return string '10570'
	 */
	public function rebajaImpuesto()
	{
		switch ( $this->salary )
		{
			case ($this->salary <= 624091):
				return Config::get('constants.rebajaImpuesto')[0];
				break;
			
			case ($this->salary > 624091 && $this->salary <= 1386870):
				return Config::get('constants.rebajaImpuesto')[1];
				break;
			
			case ($this->salary > 1386870 && $this->salary <= 2311450):
				return Config::get('constants.rebajaImpuesto')[2];
				break;
			
			case ($this->salary > 2311450 && $this->salary <= 3236030):
				return Config::get('constants.rebajaImpuesto')[3];
				break;
			
			case ($this->salary > 3236030 && $this->salary <= 4160610):
				return Config::get('constants.rebajaImpuesto')[4];
				break;
			
			case ($this->salary > 4160610 && $this->salary <= 5547480):
				return Config::get('constants.rebajaImpuesto')[5];
				break;
			
			case ($this->salary > 5547480):
				return Config::get('constants.rebajaImpuesto')[6];
				break;
		}
	}
	
	/**
	 * @return string '67090'
	 */
	public function impuestoUnico()
	{
		$impuestoUnico = $this->valorImpuestoSegundaCategoria() - $this->rebajaImpuesto();
		
		return $impuestoUnico;
	}
	
	/**
	 * @return string '79010'
	 */
	public function totalDescuentos()
	{
		$totalDescuentos = $this->descuentosAfectos() + $this->impuestoUnico();
		
		return $totalDescuentos;
	}
	
	public function sueldoLiquido()
	{
	    $sueldoLiquido = $this->totalHaber() - $this->totalDescuentos();
	    
	    return $sueldoLiquido;
	}
}

