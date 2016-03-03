    <div class="row">
    	<div class="col-md-2">
            <div class="form-group">
        		{{ Form::label('rut', 'Rut') }} <i class="fa fa-info-circle mitooltip text-primary" title="Ingrese rut sin puntos ni guión. <p class='text-center'>Ej: 19317518k</p>" data-html="true"></i>
                {{ Form::text('rut', null, ['class' => 'form-control check_rut']) }}
            </div>
    	</div>
    	<div class="col-md-4">
            <div class="form-group">
        		{{ Form::label('firm_name', 'Razón Social') }}
        		{{ Form::text('firm_name', null, ['class' => 'form-control']) }}
            </div>
    	</div>
    	<div class="col-md-4">
            <div class="form-group">
        		{{ Form::label('gyre', 'Giro') }}
        		{{ Form::text('gyre', null, ['class' => 'form-control']) }}
            </div>
    	</div>
        <div class="col-md-2">
            <div class="form-group">
                {{ Form::label('start_act', 'Inicio Act.') }}
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    {{ Form::text('start_act', null, ['class' => 'form-control data_mask']) }}
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                {{ Form::label('address', 'Dirección') }} <small class="text-muted"> (Casa Matriz)</small>
                {{ Form::text('address', null, ['class' => 'form-control']) }}
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                    {{ Form::label('region_id', 'Región') }}
                    {{ Form::select('region_id', $regions, null, ['class' => 'form-control']) }}
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                {{ Form::label('province_id', 'Provincia')}}
                {{ Form::select('province_id', $provinces, null, ['class' => 'form-control']) }}
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                {{ Form::label('commune_id', 'Comuna') }}
                {{ Form::select('commune_id', $communes, null, ['class' => 'form-control']) }}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-1">
            <div class="form-group">
                {{ Form::label('num', 'N°') }}
                {{ Form::text('num', null, ['class' => 'form-control text-center']) }}
            </div>
        </div>
        <div class="col-md-1">
            <div class="form-group">
                {{ Form::label('lot', 'Lote') }}
                {{ Form::text('lot', null, ['class' => 'form-control text-center']) }}
            </div>
        </div>
        <div class="col-md-1">
            <div class="form-group">
                {{ Form::label('ofi', 'Oficina') }}
                {{ Form::text('ofi', null, ['class' => 'form-control text-center']) }}
            </div>
        </div>
        <div class="col-md-1">
            <div class="form-group">
                {{ Form::label('floor', 'Piso') }}
                {{ Form::text('floor', null, ['class' => 'form-control text-center']) }}
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                {{ Form::label('muni_license', 'Patente Municipal') }}
                {{ Form::text('muni_license', null, ['class' => 'form-control text-center']) }}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {{ Form::label('email', 'Email') }}
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-envelope"></i>
                    </div>
                    {{ Form::email('email', null, ['class' => 'form-control', 'onBlur' => '$(this).checkEmail(this)']) }}
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <div class="form-group">
                {{ Form::label('phone1', 'Teléfono 1') }}
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-phone"></i>
                    </div>
                    {{ Form::text('phone1', null, ['class' => 'form-control']) }}
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                {{ Form::label('phone2', 'Teléfono 2') }}
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-fax"></i>
                    </div>
                    {{ Form::text('phone2', null, ['class' => 'form-control']) }}
                </div>
            </div>
        </div>
    </div>