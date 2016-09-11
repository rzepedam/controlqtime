<div class="row">
    <div class="col-md-12">
        <div class="alert alert-alt alert-success alert-dismissible" role="alert">
            <span class="text-success">Padrón</span> <i class="fa fa-info-circle text-primary tooltip-primary" data-toggle="tooltip" data-original-title="Ingrese Fechas que se encuentran en el documento físico del Padrón del Vehículo"></i>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-3 col-md-offset-2">
        {{ Form::label('emission_padron', 'Fecha Emisión', ['class' => 'control-label']) }}
        <div class="input-group date" data-plugin="datepicker" data-end-date="{{ date('d-m-Y') }}">
            {{ Form::text('emission_padron', Route::is('vehicles.create') ? null : $vehicle->dateDocumentationVehicle->emission_padron, ['class' => 'form-control text-center', 'readonly']) }}
            <span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
        </div>
    </div>
    <div class="col-md-3 col-md-offset-1">
        {{ Form::label('expiration_padron', 'Fecha Expiración', ['class' => 'control-label']) }}
        <div class="input-group date" data-plugin="datepicker" data-start-date="{{ date('d-m-Y') }}">
            {{ Form::text('expiration_padron', Route::is('vehicles.create') ? null : $vehicle->dateDocumentationVehicle->expiration_padron, ['class' => 'form-control text-center', 'placeholder' => '', 'readonly']) }}
            <span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
        </div>
    </div>
</div>
<br />
<br />
<div class="row">
    <div class="col-md-12">
        <div class="alert alert-alt alert-info alert-dismissible" role="alert">
            <span class="text-info">Seguro Obligatorio</span> <i class="fa fa-info-circle text-primary tooltip-primary" data-toggle="tooltip" data-original-title="Ingrese Fechas que se encuentran en el documento físico del Seguro Obligatorio del Vehículo"></i>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-3 col-md-offset-2">
        {{ Form::label('emission_insurance', 'Fecha Emisión', ['class' => 'control-label']) }}
        <div class="input-group date" data-plugin="datepicker" data-end-date="{{ date('d-m-Y') }}">
            {{ Form::text('emission_insurance', Route::is('vehicles.create') ? null : $vehicle->dateDocumentationVehicle->emission_insurance, ['class' => 'form-control text-center', 'placeholder' => '', 'readonly']) }}
            <span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
        </div>
    </div>
    <div class="col-md-3 col-md-offset-1">
        {{ Form::label('expiration_insurance', 'Fecha Expiración', ['class' => 'control-label']) }}
        <div class="input-group date" data-plugin="datepicker" data-start-date="{{ date('d-m-Y') }}">
            {{ Form::text('expiration_insurance', Route::is('vehicles.create') ? null : $vehicle->dateDocumentationVehicle->expiration_insurance, ['class' => 'form-control text-center', 'placeholder' => '', 'readonly']) }}
            <span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
        </div>
    </div>
</div>
<br />
<br />
<div class="row">
    <div class="col-md-12">
        <div class="alert alert-alt alert-danger alert-dismissible" role="alert">
            <span class="text-danger">Permiso de Circulación</span> <i class="fa fa-info-circle text-primary tooltip-primary" data-toggle="tooltip" data-original-title="Ingrese Fechas que se encuentran en el documento físico del Permiso de Circulación del Vehículo"></i>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-3 col-md-offset-2">
        {{ Form::label('emission_permission', 'Fecha Emisión', ['class' => 'control-label']) }}
        <div class="input-group date" data-plugin="datepicker" data-end-date="{{ date('d-m-Y') }}">
            {{ Form::text('emission_permission', Route::is('vehicles.create') ? null : $vehicle->dateDocumentationVehicle->emission_permission, ['class' => 'form-control text-center', 'placeholder' => '', 'readonly']) }}
            <span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
        </div>
    </div>
    <div class="col-md-3 col-md-offset-1">
        {{ Form::label('expiration_permission', 'Fecha Expiración', ['class' => 'control-label']) }}
        <div class="input-group date" data-plugin="datepicker" data-start-date="{{ date('d-m-Y') }}">
            {{ Form::text('expiration_permission', Route::is('vehicles.create') ? null : $vehicle->dateDocumentationVehicle->expiration_permission, ['class' => 'form-control text-center', 'placeholder' => '', 'readonly']) }}
            <span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
        </div>
    </div>
</div>