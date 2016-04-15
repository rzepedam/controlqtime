<span id="speciality{{ $i }}">
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-alt alert-warning alert-dismissible" role="alert">
                <span id="num_speciality{{ $i }}" class="text-warning">
                    Especialidad #{{ $i + 1 }}
                </span>
                <a id="speciality" class="delete-elements pull-right mitooltip" title="Eliminar Especialidad"><i class="fa fa-trash"></i></a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-5">
            <div class="form-group">
                {{ Form::label('speciality_id' . $i, 'Tipo Especialidad') }}
                {{ Form::select('type_speciality_id' . $i, $type_specialities, Session::get('type_speciality_id' . $i), ['class'=> 'form-control']) }}
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                {{ Form::label('expired_speciality' . $i, 'Fecha Expiración') }}
                <div class="input-group date afterCurrentDate">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    {{ Form::text('expired_speciality' . $i, Session::get('expired_speciality' . $i), ['class'=> 'form-control']) }}
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                {{ Form::label('institution_speciality_id' . $i, 'Institución') }}
                {{ Form::select('institution_speciality_id' . $i, $institutions, Session::get('institution_speciality_id' . $i), ['class'=> 'form-control']) }}
            </div>
        </div>
    </div>
    <br/>
</span>