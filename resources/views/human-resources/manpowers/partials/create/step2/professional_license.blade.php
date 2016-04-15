<span id="license{{ $i }}">
	<div class="row">
        <div class="col-md-12">
            <div class="alert alert-alt alert-success alert-dismissible" role="alert">
                <span id="num_license{{ $i }}" class="text-success">
                    Licencia Profesional #{{ $i + 1 }}
                </span>
                <a id="license" class="delete-elements pull-right mitooltip" title="Eliminar Licencia"><i class="fa fa-trash"></i></a>
            </div>
        </div>
    </div>
	<div class="row">
        <div class="col-md-3">
            <div class="form-group">
                {{ Form::label('type_professional_license_id' . $i, 'Tipo Licencia', ['class' => 'control-label']) }}
                {{ Form::select('type_professional_license_id' . $i, $type_professional_licenses, Session::get('type_professional_license_id' . $i), ['class'=> 'form-control']) }}
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                {{ Form::label('emission_license' . $i, 'Fecha Emisión', ['class' => 'control-label']) }}
                <div class="input-group date beforeCurrentDate">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    {{ Form::text('emission_license' . $i, Session::get('emission_license' . $i), ['class'=> 'form-control']) }}
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                {{ Form::label('expired_license' . $i, 'Fecha Expiración', ['class' => 'control-label']) }}
                <div class="input-group date afterCurrentDate">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    {{ Form::text('expired_license' . $i, Session::get('expired_license' . $i), ['class'=> 'form-control']) }}
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                {{ Form::label("is_donor" . $i, "Es donante?") }}
                <ul class="list-unstyled list-inline">
                    <li>
                        <div class="radio-custom radio-primary">
                            {{ Form::radio("is_donor" . $i, 1, (Session::get('is_donor' . $i) == 1) ? true : false) }}
                            {{ Form::label("is_donor" . $i, "Si", ['class' => 'control-label']) }}
                        </div>
                    </li>
                    <li>
                        <div class="radio-custom radio-primary">
                            {{ Form::radio("is_donor" . $i, 0, (Session::get('is_donor' . $i) == 0) ? true : false) }}
                            {{ Form::label("is_donor" . $i, "No", ['class' => 'control-label']) }}
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
	<div class="row">
        <div class="col-md-12">
            <div class="form-group">
                {{ Form::label('detail_license' . $i, 'Detalle', ['class' => 'control-label']) }}
                {{ Form::textarea('detail_license' . $i, Session::get('detail_license' . $i), ['class'=> 'form-control', 'rows'=> 3]) }}
            </div>
        </div>
    </div>
	<br />
</span>