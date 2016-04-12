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
                {{ Form::label('speciality_id', 'Especialidad') }}
                {{ Form::select('type_speciality_id[]', $type_specialities, Session::get('type_speciality_id')[$i], ['class'=> 'form-control', 'required']) }}
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                {{ Form::label('expired_speciality', 'Fecha de Vencimiento') }}
                <div class="input-group date afterCurrentDate">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    {{ Form::text('expired_speciality[]', Session::get('expired_speciality')[$i], ['class'=> 'form-control', 'required', 'readonly']) }}
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                {{ Form::label('institution_speciality_id', 'Institución') }}
                {{ Form::select('institution_speciality_id[]', $institutions, Session::get('institution_speciality_id')[$i], ['class'=> 'form-control', 'required']) }}
            </div>
        </div>
    </div>
    <br/>
</span>