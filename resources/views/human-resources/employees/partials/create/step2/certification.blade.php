<span id="certification{{ $i }}">
	<div class="row">
        <div class="col-md-12">
            <div class="alert alert-alt alert-danger alert-dismissible" role="alert">
                <span id="num_certification{{ $i }}" class="text-danger">
                    Certificación #{{ $i + 1 }}
                </span>
                <a id="certification" class="delete-elements pull-right tooltip-danger" data-toggle="tooltip" data-original-title="Eliminar Certificación" data-html="true"><i class="fa fa-trash"></i></a>
            </div>
        </div>
    </div>
	<div class="row">
        <div class="col-md-1 hide">
            <div class="form-group">
                {{ Form::label("id_certification", "ID", ["class" => "control-label"]) }}
                {{ Form::text("id_certification[]", Session::get('id_certification')[$i], ["id" => "id_certification", "class" => "form-control"]) }}
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                {{ Form::label('type_certification_id', 'Certificación', ['class' => 'control-label']) }}
                {{ Form::select('type_certification_id[]', $type_certifications, Session::get('type_certification_id')[$i], ['class'=> 'form-control']) }}
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                {{ Form::label('institution_certification_id', 'Institución', ['class' => 'control-label']) }}
                {{ Form::select('institution_certification_id[]', $institutions, Session::get('institution_certification_id')[$i], ['class'=> 'form-control']) }}
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                {{Form::label('emission_certification', 'Fecha Emisión', ['class'=> 'control-label'])}}
                <div class="input-group date beforeCurrentDate">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    {{Form::text('emission_certification[]', Session::get('emission_certification')[$i], ['class'=> 'form-control', 'readonly'])}}
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                {{ Form::label('expired_certification', 'Fecha Expiración', ['class' => 'control-label']) }}
                <div class="input-group date afterCurrentDate">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    {{ Form::text('expired_certification[]', Session::get('expired_certification')[$i], ['class'=> 'form-control', 'readonly']) }}
                </div>
            </div>
        </div>
    </div>
	<br />
</span>