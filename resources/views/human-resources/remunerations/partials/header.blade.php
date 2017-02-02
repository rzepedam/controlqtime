<div class="row">
    {{-- Trabajador Select Field --}}
    <div class="col-xs-12 col-sm-6 col-md-4 form-group">
        {{ Form::label('employee_id', 'Seleccione Trabajador') }}
        {{ Form::select('employee_id', $employees, $employee->id, ['class' => 'form-control']) }}
    </div>
</div>
<div class="well well-sm">
    <div id="content-detail-remuneration" class="row">
        <div class="col-xs-12 col-sm-6 col-md-6">
            Rut: <span id="rut">{{ $employee->rut }}</span>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6">
            Días Trabajados: <span id="days_worked">{{ $employee->days_worked_in_the_month }}</span>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6">
            Área: <span id="area">{{ $employee->contract->area->name }}</span>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6">
            Días Atrasos: <span id="days_delays">{{ $employee->num_days_delays_in_the_month }}</span>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6">
            Cargo: <span id="position">{{ $employee->contract->position->name }}</span>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6">
            Días Inasistencia: <span id="days_non_assistance">{{ $employee->days_non_assistance_in_the_month }}</span>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6">
            Fecha Ingreso: <span id="created_at">{{ $employee->contract->created_at }}</span>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6">
            Horas Extras: <span id="days_extra_hours">{{ $employee->days_extra_hours_in_the_month }}</span>
        </div>
    </div>
</div>