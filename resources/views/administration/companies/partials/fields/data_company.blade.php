<div class="row">
    <div class="col-sm-6 col-md-3 form-group">
        {{ Form::label('type_company_id', 'Tipo Empresa', ['class' => 'control-label']) }}
        {{ Form::select('type_company_id', $typeCompanies, null, ['class' => 'form-control']) }}
    </div>
    <div class="col-sm-6 col-md-3 form-group">
        {{ Form::label('rut', 'Rut', ['class' => 'control-label']) }} <i class="fa fa-info-circle text-primary tooltip-primary" data-toggle="tooltip" data-original-title="Ingrese rut sin puntos ni guión. <p class=\'text-center\'>Ej: 19317518k</p>" data-html="true"></i>
        {{ Form::text('rut', null, ['class' => 'form-control check_rut']) }}
    </div>
    <div class="col-sm-12 col-md-6 form-group">
        {{ Form::label('firm_name', 'Razón Social', ['class' => 'control-label']) }}
        {{ Form::text('firm_name', null, ['class' => 'form-control', 'data-plugin' => 'maxlength', 'maxlength' => '75']) }}
    </div>
</div>
<div class="row">
    <div class="col-sm-12 col-md-6 form-group">
        {{ Form::label('gyre', 'Giro', ['class' => 'control-label']) }}
        {{ Form::text('gyre', null, ['class' => 'form-control', 'data-plugin' => 'maxlength', 'maxlength' => '100']) }}
    </div>
    <div class="col-sm-6 col-md-3 form-group">
        {{ Form::label('start_act', 'Inicio Actividad', ['class' => 'control-label']) }}
        <div class="input-group date" data-plugin="datepicker" data-end-date="{{ date('d-m-Y') }}">
            <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
            </div>
            {{ Form::text('start_act', Route::is('companies.create') ? null : $company->start_act->format('d-m-Y'), ['class' => 'form-control text-center', 'readonly']) }}
        </div>
    </div>
    <div class="col-sm-6 col-md-3 form-group">
        {{ Form::label('muni_license', 'Patente Municipal', ['class' => 'control-label']) }}
        {{ Form::text('muni_license', null, ['class' => 'form-control text-center', 'data-plugin' => 'maxlength', 'maxlength' => '25']) }}
    </div>
</div>
<div class="row">
    <div class="col-sm-12 col-md-6 form-group">
        {{ Form::label('address', 'Dirección', ['class' => 'control-label']) }}
        {{ Form::text('address', Route::is('companies.create') ? null : $company->address->address, ['class' => 'form-control', 'data-plugin' => 'maxlength', 'maxlength' => '100']) }}
    </div>
    <div class="col-sm-3 col-md-1 form-group">
        {{ Form::label('lot', 'Lote', ['class' => 'control-label']) }}
        {{ Form::text('lot', Route::is('companies.create') ? null : $company->address->detailAddressCompany->lot, ['class' => 'form-control text-center', 'data-plugin' => 'maxlength', 'maxlength' => '5', 'threshold' => '5']) }}
    </div>
    <div class="col-sm-3 col-md-1 form-group">
        {{ Form::label('bod', 'Bodega', ['class' => 'control-label']) }}
        {{ Form::text('bod', Route::is('companies.create') ? null : $company->address->detailAddressCompany->bod, ['class' => 'form-control text-center', 'data-plugin' => 'maxlength', 'maxlength' => '5', 'threshold' => '5']) }}
    </div>
    <div class="col-sm-3 col-md-1 form-group">
        {{ Form::label('ofi', 'Oficina', ['class' => 'control-label']) }}
        {{ Form::text('ofi', Route::is('companies.create') ? null : $company->address->detailAddressCompany->ofi, ['class' => 'form-control text-center', 'data-plugin' => 'maxlength', 'maxlength' => '5', 'threshold' => '5']) }}
    </div>
    <div class="col-sm-3 col-md-1 form-group">
        {{ Form::label('floor', 'Piso', ['class' => 'control-label']) }}
        {{ Form::text('floor', Route::is('companies.create') ? null : $company->address->detailAddressCompany->floor, ['class' => 'form-control text-center', 'data-plugin' => 'maxlength', 'maxlength' => '3', 'threshold' => '3']) }}
    </div>
</div>
<div class="row">
    <div class="col-sm-4 col-md-3 form-group">
        {{ Form::label('region_id', 'Región', ['class' => 'control-label']) }}
        {{ Form::select('region_id', $regions, Route::is('companies.create') ? null : $company->address->commune->province->region->id, ['class' => 'form-control']) }}
    </div>
    <div class="col-sm-4 col-md-3 form-group">
        {{ Form::label('province_id', 'Provincia', ['class' => 'control-label'])}}
        {{ Form::select('province_id', Route::is('companies.create') ? $provinces : $provinces, Route::is('companies.create') ? null : $company->address->commune->province->id, ['class' => 'form-control']) }}
    </div>
    <div class="col-sm-4 col-md-3 form-group">
        {{ Form::label('commune_id', 'Comuna', ['class' => 'control-label']) }}
        {{ Form::select('commune_id', Route::is('companies.create') ? $communes : $communes, Route::is('companies.create') ? null : $company->address->commune->id, ['class' => 'form-control']) }}
    </div>
</div>
<div class="row">
    <div class="col-sm-6 col-md-3 form-group">
        {{ Form::label('phone1', 'Teléfono 1', ['class' => 'control-label']) }}
        <div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-phone"></i>
            </div>
            {{ Form::text('phone1', Route::is('companies.create') ? null : $company->address->phone1, ['class' => 'form-control', 'data-plugin' => 'maxlength', 'maxlength' => '20']) }}
        </div>
    </div>
    <div class="col-sm-6 col-md-3 form-group">
        {{ Form::label('phone2', 'Teléfono 2', ['class' => 'control-label']) }}
        <div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-fax"></i>
            </div>
            {{ Form::text('phone2', Route::is('companies.create') ? null : $company->address->phone2, ['class' => 'form-control', 'data-plugin' => 'maxlength', 'maxlength' => '20']) }}
        </div>
    </div>
    <div class="col-sm-12 col-md-6 form-group">
        {{ Form::label('email_company', 'Email', ['class' => 'control-label']) }}
        <div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-envelope"></i>
            </div>
            @if( Route::is('companies.create') )
                {{ Form::text('email_company', null, ['id' => 'Company', 'class' => 'form-control', 'onBlur' => '$(this).checkEmail(this)', 'data-plugin' => 'maxlength', 'maxlength' => '60']) }}
            @else
                {{ Form::text('email_company', null, ['id' => 'Company', 'class' => 'form-control', 'data-plugin' => 'maxlength', 'maxlength' => '60']) }}
            @endif
        </div>
    </div>
</div>
<br />
<div id="Company" class="row hide">
    <div class="col-md-12 text-center">
        @include('layout.ajax.show_spin_icon')
    </div>
</div>