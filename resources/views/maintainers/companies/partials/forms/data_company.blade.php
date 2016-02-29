    <div class="row">
    	<div class="col-md-2">
    		{{ Form::label('rut_business', 'Rut') }} <i class="fa fa-info-circle mitooltip text-primary" title="Ingrese rut sin guión ni dígito verificador. Ej: 80900568"></i>
    		{{ Form::text('rut_business', null, ['class' => 'form-control', 'autofocus']) }}
    	</div>
        <div class="col-md-1">
            {{ Form::label('dv', 'Dv') }}
            {{ Form::text('dv', null, ['class' => 'form-control text-center', 'disabled']) }}
        </div>
    	<div class="col-md-5">
    		{{ Form::label('business_name', 'Razón Social') }}
    		{{ Form::text('business_name', null, ['class' => 'form-control']) }}
    	</div>
    	<div class="col-md-4">
    		{{ Form::label('gyre', 'Giro') }}
    		{{ Form::text('gyre', null, ['class' => 'form-control']) }}
    	</div>
    </div>
    <br />
    <div class="row">
        <div class="col-md-6">
            {{ Form::label('address', 'Dirección') }} <small class="text-muted"> (Casa Matriz)</small>
            {{ Form::text('address', null, ['class' => 'form-control']) }}
        </div>
        <div class="col-md-2">
            {{ Form::label('region_id', 'Región') }}
            {{ Form::select('region_id', $regions, null, ['class' => 'form-control']) }}
        </div>
        <div class="col-md-2">
            {{ Form::label('province_id', 'Provincia')}}
            {{ Form::select('province_id', $provinces, null, ['class' => 'form-control']) }}
        </div>
        <div class="col-md-2">
            {{ Form::label('commune_id', 'Comuna') }}
            {{ Form::select('commune_id', $communes, null, ['class' => 'form-control']) }}
        </div>
    </div>
    <br />
    <div class="row">
        <div class="col-md-2">
            {{ Form::label('muni_license', 'Patente Municipal') }}
            {{ Form::text('muni_license', null, ['class' => 'form-control text-center']) }}
        </div>
        <div class="col-md-1">
            {{ Form::label('num', 'N°') }}
            {{ Form::text('num', null, ['class' => 'form-control text-center']) }}
        </div>
        <div class="col-md-1">
            {{ Form::label('lot', 'Lote') }}
            {{ Form::text('lot', null, ['class' => 'form-control text-center']) }}
        </div>
        <div class="col-md-1">
            {{ Form::label('ofi', 'Oficina') }}
            {{ Form::text('ofi', null, ['class' => 'form-control text-center']) }}
        </div>
        <div class="col-md-1">
            {{ Form::label('floor', 'Piso') }}
            {{ Form::text('floor', null, ['class' => 'form-control text-center']) }}
        </div>
        <div class="col-md-6">
            {{ Form::label('email', 'Email') }}
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-envelope"></i>
                </div>
                {{ Form::email('email', null, ['class' => 'form-control']) }}
            </div>
        </div>
    </div>
    <br />
    <div class="row">
        <div class="col-md-2">
            {{ Form::label('phone1', 'Teléfono 1') }}
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-phone"></i>
                </div>
                {{ Form::text('phone1', null, ['class' => 'form-control']) }}
            </div>
        </div>
        <div class="col-md-2">
            {{ Form::label('phone2', 'Teléfono 2') }}
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-fax"></i>
                </div>
                {{ Form::text('phone2', null, ['class' => 'form-control']) }}
            </div>
        </div>
    </div>