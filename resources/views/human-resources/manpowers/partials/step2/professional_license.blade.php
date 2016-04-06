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
        <div class="col-md-4">
            <div class="form-group">
                {{ Form::label('type_professional_license_id', 'Tipo Licencia') }}
                {{ Form::select('type_professional_license_id[]', $type_professional_licenses, Session::get('type_professional_license_id')[$i], ['class'=> 'form-control', 'required']) }}
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                {{ Form::label('expired_license', 'Fecha de Vencimiento') }}
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    {{ Form::text('expired_license[]', Session::get('expired_license')[$i], ['class'=> 'form-control data_mask', 'required']) }}
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                {{ Form::label('detail_license', 'Detalle') }}
                {{ Form::textarea('detail_license[]', Session::get('detail_license')[$i], ['class'=> 'form-control', 'rows'=> 3]) }}
            </div>
        </div>
    </div>
    <br/>
</span>