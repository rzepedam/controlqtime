<?php $i = 0; ?>
@foreach($company->subsidiaries as $subsidiary)
    <span id="subsidiary{{ $i }}">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-alt alert-warning alert-dismissible" role="alert">
                    <span id="num_subsidiary{{ $i }}" class="text-warning">Sucursal #{{ $i + 1 }}</span>
                    <a id="subsidiary" class="delete-elements pull-right mitooltip" title="Eliminar Sucursal"><i class="fa fa-trash"></i></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-1 hide">
                <div class="form-group">
                    {{ Form::label('id_suc' . $i, 'ID') }}
                    {{ Form::text('id_suc' . $i, $subsidiary->id, ['class' => 'form-control']) }}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label("address_suc" . $i, "Dirección") }}
                    {{ Form::text("address_suc" . $i, $subsidiary->address, ["class"=> "form-control"]) }}
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    {{ Form::label("region_suc_id" . $i, "Región") }}
                    {{ Form::select("region_suc_id" . $i, $regions, $region_sub[$i]->id, ["class"=> "form-control", "onChange"=> "$(this).changeRegion()"]) }}
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    {{ Form::label("province_suc_id" . $i, "Provincia") }}
                    {{ Form::select("province_suc_id" . $i, $provinces_sub[$i], $province_sub[$i]->id, ["class"=> "form-control", "onChange"=> "$(this).changeProvince()"]) }}
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    {{ Form::label("commune_suc_id" . $i, "Comuna") }}
                    {{ Form::select("commune_suc_id" . $i, $communes_sub[$i], $subsidiary->commune_id, ["class"=> "form-control"]) }}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-1">
                <div class="form-group">
                    {{ Form::label("num_suc" . $i, "N°") }}
                    {{ Form::text("num_suc" . $i, $subsidiary->num, ["class"=> "form-control text-center"]) }}
                </div>
            </div>
            <div class="col-md-1">
                <div class="form-group">
                    {{ Form::label("lot_suc" . $i, "Lote") }}
                    {{ Form::text("lot_suc" . $i, $subsidiary->lot, ["class"=> "form-control text-center"]) }}
                </div>
            </div>
            <div class="col-md-1">
                <div class="form-group">
                    {{ Form::label("ofi_suc" . $i, "Oficina") }}
                    {{ Form::text("ofi_suc" . $i, $subsidiary->ofi, ["class"=> "form-control text-center"]) }}
                </div>
            </div>
            <div class="col-md-1">
                <div class="form-group">
                    {{ Form::label("floor_suc" . $i, "Piso") }}
                    {{ Form::text("floor_suc" . $i, $subsidiary->floor, ["class"=> "form-control text-center"]) }}
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    {{ Form::label("muni_license_suc" . $i, "Patente Municipal") }}
                    {{ Form::text("muni_license_suc" . $i, $subsidiary->muni_license, ["class"=> "form-control text-center"]) }}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label("email_suc" . $i, "Email") }}
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-envelope"></i>
                        </div>
                        {{ Form::text("email_suc" . $i, $subsidiary->email, ["class"=> "form-control", "onBlur"=> "$(this).checkEmail(this)"]) }}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    {{ Form::label("phone1_suc-" . $i, "Teléfono 1") }}
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-phone"></i>
                        </div>
                        {{ Form::text("phone1_suc-" . $i, $subsidiary->phone1, ["class"=> "form-control"]) }}
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    {{ Form::label("phone2_suc-" . $i, "Teléfono 2") }}
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-fax"></i>
                        </div>
                        {{ Form::text("phone2_suc-" . $i, $subsidiary->phone2, ["class"=> "form-control"]) }}
                    </div>
                </div>
            </div>
        </div>
        <hr/>
    </span>
    <?php $i++; ?>
@endforeach