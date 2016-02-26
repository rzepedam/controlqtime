<div class="row">
	<div class="col-md-2">
		{!! Form::label('rut_business', 'Rut') !!}
		{!! Form::text('rut_business', null, ['class' => 'form-control', 'autofocus']) !!}
	</div>
	<div class="col-md-5">
		{!! Form::label('business_name', 'Razón Social') !!}
		{!! Form::text('business_name', null, ['class' => 'form-control']) !!}
	</div>
	<div class="col-md-4">
		{!! Form::label('gyre', 'Giro') !!}
		{!! Form::text('gyre', null, ['class' => 'form-control']) !!}
	</div>
	<div class="col-md-1">
		{!! Form::label('num_worker', 'N° Trab.') !!}
		{!! Form::text('num_worker', null, ['class' => 'form-control text-center']) !!}
	</div>
</div>
<br />
<div class="row">
    <div class="col-md-5">
        {!! Form::label('address', 'Dirección') !!}
        {!! Form::text('address', null, ['class' => 'form-control']) !!}
    </div>
    <div class="col-md-1">
        {!! Form::label('num', 'N°') !!}
        {!! Form::text('num', null, ['class' => 'form-control text-center']) !!}
    </div>
    <div class="col-md-1">
        {!! Form::label('lot', 'Lote') !!}
        {!! Form::text('lot', null, ['class' => 'form-control text-center']) !!}
    </div>
    <div class="col-md-5">
        {!! Form::label('email', 'Email') !!}
        <div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-envelope"></i>
            </div>
            {!! Form::email('email', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>
<br />
<div class="row">
    <div class="col-md-2">
        {!! Form::label('phone1', 'Teléfono 1') !!}
        <div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-phone"></i>
            </div>
            {!! Form::text('phone1', null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-md-2">
        {!! Form::label('phone2', 'Teléfono 2') !!}
        <div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-fax"></i>
            </div>
            {!! Form::text('phone2', null, ['class' => 'form-control']) !!}
        </div>
    </div>
	<div class="col-md-8">
		{!! Form::label('area_id', 'Área de Operación') !!}
		{!! Form::select('area_id', $areas, null, ['class' => 'form-control', 'multiple' => 'multiple']) !!}
	</div>
</div>