<div class="row">
    <div class="col-md-4">
        {{-- Empresa Form Select --}}
        <div class="form-group">
            {{ Form::label('company_id', 'Empresa', ['class' => 'control-label']) }}
            {{ Form::select('company_id', $companies, null, ['class' => 'form-control', 'data-plugin' => 'selectpicker', 'data-live-search' => 'true']) }}
        </div>
    </div>
    <div class="col-md-4">
        {{-- Trabajador Form Select --}}
        <div class="form-group">
            {{ Form::label('employee_id', 'Trabajador', ['class' => 'control-label']) }}
            {{ Form::select('employee_id', $employees, null, ['class' => 'form-control', 'data-plugin' => 'selectpicker', 'data-live-search' => 'true']) }}
        </div>
    </div>
    <div class="col-md-4">
        {{-- Cargo Form Select --}}
        <div class="form-group">
            {{ Form::label('position_id', 'Cargo', ['class' => 'control-label']) }}
            {{ Form::select('position_id', $positions, null, ['class' => 'form-control']) }}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        {{-- Área Form Select --}}
        <div class="form-group">
            {{ Form::label('area_id', 'Área', ['class' => 'control-label']) }}
            {{ Form::select('area_id', $areas, null, ['class' => 'form-control']) }}
        </div>
    </div>
    <div class="col-md-4">
        {{-- Nº de Horas Form Select --}}
        <div class="form-group">
            {{ Form::label('num_hour_id', 'Nº de Horas', ['class' => 'control-label']) }}
            {{ Form::select('num_hour_id', $numHours, null, ['class' => 'form-control']) }}
        </div>
    </div>
    <div class="col-md-4">
        {{-- Periocidad Horas Form Select --}}
        <div class="form-group">
            {{ Form::label('periodicity_id', 'Periocidad Horas', ['class' => 'control-label']) }}
            {{ Form::select('periodicity_id', $periodicities, null, ['class' => 'form-control']) }}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        {{-- Jornada Laboral Form Select --}}
        <div class="form-group">
            {{ Form::label('day_trip_id', 'Jornada Laboral', ['class' => 'control-label']) }}
            {{ Form::select('day_trip_id', $dayTrips, null, ['class' => 'form-control']) }}
        </div>
    </div>
    {{-- Horario Mañana Input Text --}}
    <div class="col-md-4">
        {{ Form::label('init_afternoon', 'Horario Mañana', ['class' => 'control-label']) }} <i class="fa fa-info-circle tooltip-primary text-primary" data-placement="right" data-toggle="tooltip" data-original-title="Inicio Jornada Laboral - Término Jornada Laboral únicamente mañana" data-html="true"></i>
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="input-group" data-plugin="clockpicker" data-default="09:00">
                    {{ Form::text('init_morning', '09:00', ['class' => 'form-control', 'placeholder' => 'Desde...', 'readonly']) }}
                    <span class="input-group-addon"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="input-group" data-plugin="clockpicker" data-default="13:00">
                    {{ Form::text('end_morning', '13:00', ['class' => 'form-control', 'placeholder' => 'Hasta...', 'readonly']) }}
                    <span class="input-group-addon"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
                </div>
            </div>
        </div>
    </div>
    <span class="visible-xs visible-sm">
        <br />
    </span>
    {{-- Horario Tarde Input Text --}}
    <div class="col-md-4">
        {{ Form::label('init_afternoon', 'Horario Tarde', ['class' => 'control-label']) }} <i class="fa fa-info-circle tooltip-primary text-primary" data-placement="right" data-toggle="tooltip" data-original-title="Inicio Jornada Laboral - Término Jornada Laboral únicamente tarde" data-html="true"></i>
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="input-group" data-plugin="clockpicker" data-default="14:00">
                    {{ Form::text('init_afternoon', '14:00', ['class' => 'form-control', 'placeholder' => 'Desde...', 'readonly']) }}
                    <span class="input-group-addon"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="input-group" data-plugin="clockpicker" data-default="19:00">
                    {{ Form::text('end_afternoon', '19:00', ['class' => 'form-control', 'placeholder' => 'Hasta...', 'readonly']) }}
                    <span class="input-group-addon"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
                </div>
            </div>
        </div>
    </div>
    <span class="visible-xs visible-sm">
        <br />
    </span>
</div>


