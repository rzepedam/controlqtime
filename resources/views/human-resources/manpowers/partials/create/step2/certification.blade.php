<span id="certification{{ $i }}">
	<div class="row">
        <div class="col-md-12">
            <div class="alert alert-alt alert-danger alert-dismissible" role="alert">
                <span id="num_certification{{ $i }}" class="text-danger">
                    Certificación #{{ $i + 1 }}
                </span>
                <a id="certification" class="delete-elements pull-right mitooltip" title="Eliminar Certificación"><i class="fa fa-trash"></i></a>
            </div>
        </div>
    </div>
	<div class="row">
        <div class="col-md-5">
            <div class="form-group">
                {{ Form::label('type_certification_id' . $i, 'Certificación', ['class' => 'control-label']) }}
                {{ Form::select('type_certification_id' . $i, $type_certifications, Session::get('type_certification_id' . $i), ['class'=> 'form-control']) }}
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                {{ Form::label('expired_certification' . $i, 'Fecha Expiración', ['class' => 'control-label']) }}
                <div class="input-group date afterCurrentDate">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    {{ Form::text('expired_certification' . $i, Session::get('expired_certification' . $i), ['class'=> 'form-control']) }}
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                {{ Form::label('institution_certification_id' . $i, 'Institución', ['class' => 'control-label']) }}
                {{ Form::select('institution_certification_id' . $i, $institutions, Session::get('institution_certification_id' . $i), ['class'=> 'form-control']) }}
            </div>
        </div>
    </div>
	<br />
</span>