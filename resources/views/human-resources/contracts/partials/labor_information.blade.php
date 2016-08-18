<div class="row">
    <div class="col-md-4">
        {{-- Empresa Form Select --}}
        <div class="form-group">
            {{ Form::label('company_id', 'Empresa', ['class' => 'control-label']) }}
            {{ Form::select('company_id', $companies, null, ['class' => 'form-control']) }}
        </div>
    </div>
    <div class="col-md-4">
        {{-- Trabajador Form Select --}}
        <div class="form-group">
            {{ Form::label('employee_id', 'Trabajador', ['class' => 'control-label']) }}
            {{ Form::select('employee_id', $employees, null, ['class' => 'form-control']) }}
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
        {{-- Nº de Horas Form Select --}}
        <div class="form-group">
            {{ Form::label('num_hour_id', 'Nº de Horas', ['class' => 'control-label']) }}
            {{ Form::select('num_hour_id', $numHours, null, ['class' => 'form-control']) }}
        </div>
    </div>
    <div class="col-md-4">
        {{-- Periocidad Horas Form Select --}}
        <div class="form-group">
            {{ Form::label('periodicity_hour_id', 'Periocidad Horas', ['class' => 'control-label']) }}
            {{ Form::select('periodicity_hour_id', $periodicities, null, ['class' => 'form-control']) }}
        </div>
    </div>
    <div class="col-md-4">
        {{-- Jornada Laboral Form Select --}}
        <div class="form-group">
            {{ Form::label('day_trip_id', 'Jornada Laboral', ['class' => 'control-label']) }}
            {{ Form::select('day_trip_id', $dayTrips, null, ['class' => 'form-control']) }}
        </div>
    </div>
</div>
<div class="row">
    {{-- Horario Mañana Input Text --}}
    <div class="col-md-4">
        {{ Form::label('init_afternoon', 'Horario Mañana', ['class' => 'control-label']) }}
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                {{ Form::text('init_morning', null, ['class' => 'form-control', 'placeholder' => 'Desde...']) }}
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                {{ Form::text('end_morning', null, ['class' => 'form-control', 'placeholder' => 'Hasta...']) }}
            </div>
        </div>
    </div>

    <span class="visible-xs visible-sm">
        <br />
    </span>

    {{-- Horario Tarde Input Text --}}
    <div class="col-md-4">
        {{ Form::label('init_afternoon', 'Horario Tarde', ['class' => 'control-label']) }}
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                {{ Form::text('init_afternoon', null, ['class' => 'form-control', 'placeholder' => 'Desde...']) }}
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                {{ Form::text('end_afternoon', null, ['class' => 'form-control', 'placeholder' => 'Hasta...']) }}
            </div>
        </div>
    </div>
    <span class="visible-xs visible-sm">
        <br />
    </span>
    <div class="col-md-4">
        {{-- Periocidad Laboral Form Select --}}
        <div class="form-group">
            {{ Form::label('periodicity_work_id', 'Periocidad Laboral', ['class' => 'control-label']) }}
            {{ Form::select('periodicity_work_id', $periodicities, null, ['class' => 'form-control']) }}
        </div>
    </div>
</div>


