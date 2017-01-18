<div class="row">
    {{-- Trabajador Select Field --}}
    <div class="col-xs-12 col-sm-6 col-md-4 form-group">
        {{ Form::label('employee_id', 'Seleccione Trabajador') }}
        {{ Form::select('employee_id', $employees, $employee->id, ['class' => 'form-control']) }}
    </div>
</div>
<div class="well well-sm">
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6">
            Rut: {{ $employee->rut }}
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6">
            Días Trabajados: {{ $employee->days_worked_in_the_month }}
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6">
            Área: {{ $employee->contract->area->name }}
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6">
            Días Atrasos: {{ $employee->days_delays_in_the_month }}
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6">
            Cargo: {{ $employee->contract->position->name }}
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6">
            Días Inasistencia: {{ $employee->days_non_assistance_in_the_month }}
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6">
            Fecha Ingreso: {{ $employee->contract->created_at }}
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6">
            Horas Extras: {{ $employee->days_extra_hours_in_the_month }}
        </div>
    </div>
</div>