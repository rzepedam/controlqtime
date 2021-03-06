{{-- Empresa Form Select --}}
<div class="col-xs-12 col-sm-6 col-md-3 form-group">
    {{ Form::label('company_id', 'Empresa', ['class' => 'control-label']) }}
    {{ Form::select('company_id', $companies, null, ['class' => 'form-control', 'data-plugin' => 'selectpicker', 'data-live-search' => 'true']) }}
</div>
{{-- Trabajador Form Select --}}
<div class="col-xs-12 col-sm-6 col-md-3 form-group">
    {{ Form::label('employee_id', 'Trabajador', ['class' => 'control-label']) }}
    {{ Form::select('employee_id', $employees, null, ['class' => 'form-control', 'data-plugin' => 'selectpicker', 'data-live-search' => 'true']) }}
</div>
{{-- Inicio Contrato Text Field --}}
<div class="col-xs-12 col-sm-6 col-md-3 form-group">
    {{ Form::label('start_contract', 'Inicio Contrato', ['class' => 'control-label']) }}
    <div class="input-group date" data-plugin="datepicker">
        <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
        </div>
        {{ Form::text('start_contract', date('d-m-Y'), ['class' => 'form-control text-center', 'readonly']) }}
    </div>
</div>
{{-- Cargo Form Select --}}
<div class="col-xs-12 col-sm-6 col-md-3 form-group">
    {{ Form::label('position_id', 'Cargo', ['class' => 'control-label']) }}
    {{ Form::select('position_id', $positions, null, ['class' => 'form-control']) }}
</div>
{{-- Área Form Select --}}
<div class="col-xs-12 col-sm-6 col-md-3 form-group">
    {{ Form::label('area_id', 'Área', ['class' => 'control-label']) }}
    {{ Form::select('area_id', $areas, null, ['class' => 'form-control']) }}
</div>
{{-- Tipo Contrato Form Select --}}
<div class="col-xs-12 col-sm-6 col-md-3 form-group">
    {{ Form::label('type_contract_id', 'Tipo Contrato', ['class' => 'control-label']) }}
    {{ Form::select('type_contract_id', $typeContracts, null, ['class' => 'form-control']) }}
</div>
{{-- Jornada Laboral Form Select --}}
<div class="col-xs-12 col-sm-6 col-md-3 form-group">
    {{ Form::label('day_trip_id', 'Jornada Laboral', ['class' => 'control-label']) }}
    {{ Form::select('day_trip_id', $dayTrips, null, ['class' => 'form-control']) }}
</div>
{{-- Nº de Horas Text Field --}}
<div class="col-xs-12 col-sm-2 col-md-2 form-group">
    {{ Form::label('num_hour', 'Nº de Horas') }} <i class="fa fa-info-circle tooltip-primary text-primary" data-placement="right" data-toggle="tooltip" data-original-title="Ingrese valor comprendido entre 1 - 45" data-html="true"></i>
    {{ Form::text('num_hour', null, ['class' => 'form-control text-center']) }}
</div>
{{-- Horario Mañana Input Text --}}
<div class="col-xs-12 col-sm-6 col-md-3 form-group">
    {{ Form::label('init_afternoon', 'Horario Mañana', ['class' => 'control-label']) }} <i class="fa fa-info-circle tooltip-primary text-primary" data-placement="right" data-toggle="tooltip" data-original-title="Inicio Jornada Laboral - Término Jornada Laboral únicamente mañana" data-html="true"></i>
    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="input-group" data-plugin="clockpicker" data-default="09:00">
                {{ Form::text('init_morning', '09:00', ['id' => 'init_morning', 'class' => 'form-control', 'placeholder' => 'Desde...', 'readonly']) }}
                <span class="input-group-addon"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="input-group" data-plugin="clockpicker" data-default="13:00">
                {{ Form::text('end_morning', '13:00', ['id' => 'end_morning', 'class' => 'form-control', 'placeholder' => 'Hasta...', 'readonly']) }}
                <span class="input-group-addon"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
            </div>
        </div>
    </div>
</div>
<div class="col-xs-12 col-sm-6 col-md-3 form-group">
    {{ Form::label('init_afternoon', 'Horario Tarde', ['class' => 'control-label']) }} <i class="fa fa-info-circle tooltip-primary text-primary" data-placement="right" data-toggle="tooltip" data-original-title="Inicio Jornada Laboral - Término Jornada Laboral únicamente tarde" data-html="true"></i>
    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="input-group" data-plugin="clockpicker" data-default="14:00">
                {{ Form::text('init_afternoon', '14:00', ['id' => 'init_afternoon', 'class' => 'form-control', 'placeholder' => 'Desde...', 'readonly']) }}
                <span class="input-group-addon"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="input-group" data-plugin="clockpicker" data-default="19:00">
                {{ Form::text('end_afternoon', '19:00', ['id' => 'end_afternoon', 'class' => 'form-control', 'placeholder' => 'Hasta...', 'readonly']) }}
                <span class="input-group-addon"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
            </div>
        </div>
    </div>
</div>


