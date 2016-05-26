<div class="row">
    {{-- Tipo Empresa Form Select --}}
    <div class="form-group col-md-2">
        {{ Form::label('type_company_id', 'Tipo Empresa', ['class' => 'control-label']) }}
        {{ Form::select('type_company_id', $type_companies, null, ['class' => 'form-control']) }}
    </div>
    <div class="col-md-2">
        <div class="form-group">
            {{ Form::label('rut', 'Rut', ['class' => 'control-label']) }} <i class="fa fa-info-circle text-primary tooltip-primary" data-toggle="tooltip" data-original-title="Ingrese rut sin puntos ni guión. <p class='text-center'>Ej: 19317518k</p>" data-html="true"></i>
            {{ Form::text('rut', null, ['class' => 'form-control check_rut']) }}
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('firm_name', 'Razón Social', ['class' => 'control-label']) }}
            {{ Form::text('firm_name', null, ['class' => 'form-control']) }}
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('gyre', 'Giro', ['class' => 'control-label']) }}
            {{ Form::text('gyre', null, ['class' => 'form-control']) }}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('start_act', 'Inicio Act.', ['class' => 'control-label']) }}
            <div class="input-group date">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
                {{ Form::text('start_act', $company->start_act->format('d-m-Y'), ['class' => 'form-control', 'readonly']) }}
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('address', 'Dirección', ['class' => 'control-label']) }} <small class="text-muted"> (Casa Matriz)</small>
            {{ Form::text('address', null, ['class' => 'form-control']) }}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
                {{ Form::label('region_id', 'Región', ['class' => 'control-label']) }}
                {{ Form::select('region_id', $regions, $company->commune->province->region->id, ['class' => 'form-control']) }}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('province_id', 'Provincia', ['class' => 'control-label'])}}
            {{ Form::select('province_id', $provinces, $company->commune->province->id, ['class' => 'form-control']) }}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('commune_id', 'Comuna', ['class' => 'control-label']) }}
            {{ Form::select('commune_id', $communes, null, ['class' => 'form-control']) }}
        </div>
    </div>
    <div class="col-md-1">
        <div class="form-group">
            {{ Form::label('num', 'N°', ['class' => 'control-label']) }}
            {{ Form::text('num', null, ['class' => 'form-control text-center']) }}
        </div>
    </div>
    <div class="col-md-1">
        <div class="form-group">
            {{ Form::label('lot', 'Lote', ['class' => 'control-label']) }}
            {{ Form::text('lot', null, ['class' => 'form-control text-center']) }}
        </div>
    </div>
    <div class="col-md-1">
        <div class="form-group">
            {{ Form::label('bod', 'Bodega', ['class' => 'control-label']) }}
            {{ Form::text('bod', null, ['class' => 'form-control text-center']) }}
        </div>
    </div>
    <div class="col-md-1">
        <div class="form-group">
            {{ Form::label('ofi', 'Oficina', ['class' => 'control-label']) }}
            {{ Form::text('ofi', null, ['class' => 'form-control text-center']) }}
        </div>
    </div>
    <div class="col-md-1">
        <div class="form-group">
            {{ Form::label('floor', 'Piso', ['class' => 'control-label']) }}
            {{ Form::text('floor', null, ['class' => 'form-control text-center']) }}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-2">
        <div class="form-group">
            {{ Form::label('muni_license', 'Patente Municipal', ['class' => 'control-label']) }}
            {{ Form::text('muni_license', null, ['class' => 'form-control text-center']) }}
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            {{ Form::label('phone1', 'Teléfono 1', ['class' => 'control-label']) }}
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
            {{ Form::label('phone2', 'Teléfono 2', ['class' => 'control-label']) }}
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-fax"></i>
                </div>
                {{ Form::text('phone2', null, ['class' => 'form-control']) }}
            </div>
        </div>
    </div>
    <div class="col-md-6">
            <div class="form-group">
                {{ Form::label('email_company', 'Email', ['class' => 'control-label']) }}
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-envelope"></i>
                    </div>
                    {{ Form::text('email_company', null, ['id' => 'Company', 'class' => 'form-control']) }}
                </div>
            </div>
    </div>
</div>