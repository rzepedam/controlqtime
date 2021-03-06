<?php

namespace Controlqtime\Core\Entities;

use Carbon\Carbon;
use Jenssegers\Date\Date;
use Controlqtime\Core\Helpers\FormatField;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Contract extends Eloquent
{
    use SoftDeletes;

	/**
	 * @var array
	 */
	protected $dates = [
		'start_contract', 'expires_at', 'deleted_at',
	];

    /**
     * @var array
     */
    protected $fillable = [
        'company_id', 'employee_id', 'start_contract', 'position_id', 'area_id', 'type_contract_id',
        'num_hour', 'day_trip_id', 'init_morning', 'end_morning', 'init_afternoon', 'end_afternoon',
        'salary', 'mobilization', 'collation', 'forecast_id', 'pension_id', 'expires_at',
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
	 * @param $value
	 */
	public function setStartContractAttribute($value)
    {
        $this->attributes['start_contract'] = Carbon::createFromFormat('d-m-Y', $value);
    }

    /**
     * @param string $value (09:00)
     */
    public function setInitMorningAttribute($value)
    {
        $this->attributes['init_morning'] = str_replace(':', '', $value);
    }

    /**
     * @param string $value (13:00)
     */
    public function setEndMorningAttribute($value)
    {
        $this->attributes['end_morning'] = str_replace(':', '', $value);
    }

    /**
     * @param string $value (14:00)
     */
    public function setInitAfternoonAttribute($value)
    {
        $this->attributes['init_afternoon'] = str_replace(':', '', $value);
    }

    /**
     * @param string $value (19:00)
     */
    public function setEndAfternoonAttribute($value)
    {
        $this->attributes['end_afternoon'] = str_replace(':', '', $value);
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
     * @param date '2016-10-01 10:22:46'
     *
     * @return string '01-10-2016'
     */
    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }

    /**
     * @param date '2016-10-01 10:22:46'
     *
     * @return string '01-10-2016'
     */
    public function getStartContractAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }

    /*
    * @return string 'martes 13 diciembre 2016'
    */
    public function getCreatedAtToSpanishFormatAttribute()
    {
        return Date::parse($this->created_at)->format('l j F Y');
    }

    /**
     * @return string 'martes 13 diciembre 2016'
     */
    public function getStartContractToSpanishFormatAttribute()
    {
        return Date::parse($this->start_contract)->format('l j F Y');
    }

    /**
     * @return string '15.000'
     */
    public function getMobilizationMoneyFieldAttribute()
    {
        return FormatField::decimalNumber($this->mobilization);
    }

    /**
     * @return string '15.000'
     */
    public function getCollationMoneyFieldAttribute()
    {
        return FormatField::decimalNumber($this->collation);
    }

    /**
     * @return string '250.000'
     */
    public function getSueldoBaseAttribute()
    {
        return FormatField::decimalNumber($this->salary);
    }

    /**
     * @return string '716.909'
     */
    public function getGratificationAttribute()
    {
        return FormatField::decimalNumber($this->gratification());
    }

    /**
     * @return string '9.500'
     */
    public function getValorTotalHorasExtraAttribute()
    {
        return FormatField::decimalNumber($this->valorTotalHorasExtra());
    }

    /**
     * @return string '7.340'
     */
    public function getValorInasistenciaAttribute()
    {
        return FormatField::decimalNumber($this->valorInasistencia());
    }

    /**
     * @return string '20.129'
     */
    public function getValorAtrasoAttribute()
    {
        return FormatField::decimalNumber($this->valorAtraso());
    }

    /**
     * @return string '239.100'
     */
    public function getTotalAsistenciaAtrasosAttribute()
    {
        return FormatField::decimalNumber($this->totalAsistenciaAtrasos());
    }

    /**
     * @return string '550.500'
     */
    public function getTotalImponibleAttribute()
    {
        return FormatField::decimalNumber($this->totalImponible());
    }

    /**
     * @return string '550.500'
     */
    public function getAsignacionFamiliarAttribute()
    {
        return FormatField::decimalNumber($this->asignacionFamiliar());
    }

    /**
     * @return string '120.000'
     */
    public function getBonoNoImponibleAttribute()
    {
        return FormatField::decimalNumber($this->bonoNoImponible());
    }

    /**
     * @return string '835.000'
     */
    public function getTotalHaberAttribute()
    {
        return FormatField::decimalNumber($this->totalHaber());
    }

    /**
     * @return string '75.000'
     */
    public function getTotalPensionAttribute()
    {
        return FormatField::decimalNumber($this->totalPension());
    }

    /**
     * @return string '3.512'
     */
    public function getSeguroCesantiaAttribute()
    {
        return FormatField::decimalNumber($this->seguroCesantia());
    }

    /**
     * @return string '45.000'
     */
    public function getTotalForecastAttribute()
    {
        return FormatField::decimalNumber($this->totalForecast());
    }

    /**
     * @return string '120.000'
     */
    public function getDescuentosAfectosAttribute()
    {
        return FormatField::decimalNumber($this->descuentosAfectos());
    }

    /**
     * @return string '167.344'
     */
    public function getBaseTributableAttribute()
    {
        return FormatField::decimalNumber($this->baseTributable());
    }

    /**
     * @return string '14.120'
     */
    public function getValorImpuestoSegundaCategoriaAttribute()
    {
        return FormatField::decimalNumber($this->valorImpuestoSegundaCategoria());
    }

    /**
     * @return string '56.800'
     */
    public function getRebajaImpuestoAttribute()
    {
        return FormatField::decimalNumber($this->rebajaImpuesto());
    }

    /**
     * @return string '12.897'
     */
    public function getImpuestoUnicoAttribute()
    {
        return FormatField::decimalNumber($this->impuestoUnico());
    }

    /**
     * @return string '179.810'
     */
    public function getTotalDescuentosAttribute()
    {
        return FormatField::decimalNumber($this->totalDescuentos());
    }

    /**
     * @return string '1.109.000'
     */
    public function getSueldoLiquidoAttribute()
    {
        return FormatField::decimalNumber($this->sueldoLiquido());
    }

    public function gratification()
    {
        $gratification = (config('constants.sueldo_minimo') * 4.75) / 12;

        return $gratification;
    }

    public function valorHora()
    {
        $valorHora = ($this->salary / 30 * 28) / 180;

        return $valorHora;
    }

    public function valorHoraExtra()
    {
        $valorHoraExtra = $this->valorHora() * config('constants.valor_hora_extra');

        return $valorHoraExtra;
    }

    public function valorTotalHorasExtra()
    {
        $valorTotalHorasExtra = $this->valorHoraExtra() * $this->employee->getDaysExtraHoursInTheMonthAttribute();

        return $valorTotalHorasExtra;
    }

    public function valorInasistencia()
    {
        $valorInasistencia = $this->valorHoraExtra() * $this->employee->getDaysNonAssistanceInTheMonthAttribute() * 9;

        return $valorInasistencia;
    }

    public function valorAtraso()
    {
        $valorAtraso = $this->employee->detailDaysDelaysInTheMonth() * $this->valorHoraExtra();

        return $valorAtraso;
    }

    public function totalAsistenciaAtrasos()
    {
        $totalAsistenciaAtrasos = $this->valorInasistencia() + $this->valorAtraso();

        return $totalAsistenciaAtrasos;
    }

    public function totalImponible()
    {
        $totalImponible = $this->salary + $this->gratification() + $this->valorTotalHorasExtra() - $this->totalAsistenciaAtrasos();

        return $totalImponible;
    }

    public function asignacionFamiliar()
    {
        switch ($this->salary) {
            case $this->salary <= 270196:
                return config('constants.familyAllowance')[0] * $this->employee->num_family_responsabilities;
                break;

            case $this->salary > 270196 && $this->salary <= 394651:
                return config('constants.familyAllowance')[1] * $this->employee->num_family_responsabilities;
                break;

            case $this->salary > 394651 && $this->salary <= 615521:
                return config('constants.familyAllowance')[2] * $this->employee->num_family_responsabilities;
                break;

            default:
                return 0;
                break;
        }
    }

    public function bonoNoImponible()
    {
        $bonoNoImponible = $this->mobilization + $this->collation;

        return $bonoNoImponible;
    }

    public function totalHaber()
    {
        $totalHaber = $this->totalImponible() + $this->asignacionFamiliar() + $this->bonoNoImponible();

        return $totalHaber;
    }

    public function totalPension()
    {
        $totalPension = $this->totalImponible() * ($this->pension->com + 0.10);

        return $totalPension;
    }

    public function seguroCesantia()
    {
        $seguroCesantia = $this->totalImponible() * 0.006;

        return $seguroCesantia;
    }

    public function totalForecast()
    {
        $totalForecast = $this->totalImponible() * 0.07;

        return $totalForecast;
    }

    public function descuentosAfectos()
    {
        $descuentosAfectos = $this->totalPension() + $this->seguroCesantia() + $this->totalForecast();

        return $descuentosAfectos;
    }

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
        switch ($this->salary) {
            case $this->salary <= 624091:
                return $this->baseTributable() * config('constants.impuestoSegundaCategoria')[0];
                break;

            case $this->salary > 624091 && $this->salary <= 1386870:
                return $this->baseTributable() * config('constants.impuestoSegundaCategoria')[1];
                break;

            case $this->salary > 1386870 && $this->salary <= 2311450:
                return $this->baseTributable() * config('constants.impuestoSegundaCategoria')[2];
                break;

            case $this->salary > 2311450 && $this->salary <= 3236030:
                return $this->baseTributable() * config('constants.impuestoSegundaCategoria')[3];
                break;

            case $this->salary > 3236030 && $this->salary <= 4160610:
                return $this->baseTributable() * config('constants.impuestoSegundaCategoria')[4];
                break;

            case $this->salary > 4160610 && $this->salary <= 5547480:
                return $this->baseTributable() * config('constants.impuestoSegundaCategoria')[5];
                break;

            case $this->salary > 5547480:
                return $this->baseTributable() * config('constants.impuestoSegundaCategoria')[6];
                break;
        }
    }

    /**
     * @return string '10570'
     */
    public function rebajaImpuesto()
    {
        switch ($this->salary) {
            case $this->salary <= 624091:
                return config('constants.rebajaImpuesto')[0];
                break;

            case $this->salary > 624091 && $this->salary <= 1386870:
                return config('constants.rebajaImpuesto')[1];
                break;

            case $this->salary > 1386870 && $this->salary <= 2311450:
                return config('constants.rebajaImpuesto')[2];
                break;

            case $this->salary > 2311450 && $this->salary <= 3236030:
                return config('constants.rebajaImpuesto')[3];
                break;

            case $this->salary > 3236030 && $this->salary <= 4160610:
                return config('constants.rebajaImpuesto')[4];
                break;

            case $this->salary > 4160610 && $this->salary <= 5547480:
                return config('constants.rebajaImpuesto')[5];
                break;

            case $this->salary > 5547480:
                return config('constants.rebajaImpuesto')[6];
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
