<?php $i = 0; ?>
@foreach($company->subsidiaries as $subsidiary)
    <span id="subsidiary{{ $i }}">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-alt alert-warning alert-dismissible" role="alert">
                    <span id="num_subsidiary{{ $i }}" class="text-warning">Sucursal #{{ $i + 1 }}</span>
                    <a id="subsidiary" class="delete-elements pull-right tooltip-danger" data-toggle="tooltip" data-original-title="Eliminar Sucursal" data-html="true"><i class="fa fa-trash"></i></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-1 hide">
                <div class="form-group">
                    {{ Form::label("id_suc" . $i, "ID", ["class" => "control-label"]) }}
                    {{ Form::text("id_suc[]", $subsidiary->id, ["id" => "id_suc" . $i, "class" => "form-control"]) }}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label("address_suc[]", "Dirección", ["class" => "control-label"]) }}
                    {{ Form::text("address_suc[]", $subsidiary->address_suc, ["class"=> "form-control"]) }}
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    {{ Form::label("region_suc_id" . $i, "Región", ["class" => "control-label"]) }}
                    {{ Form::select("region_suc_id[]", $regions, $subsidiary->commune->province->region->id, ["class"=> "form-control", "onChange"=> "$(this).changeRegion()", "id"=> "region_suc_id" . $i]) }}
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    {{ Form::label("province_suc_id" . $i, "Provincia", ["class" => "control-label"]) }}
                    {{ Form::select("province_suc_id[]", $provinces, $subsidiary->commune->province->id, ["class"=> "form-control", "onChange"=> "$(this).changeProvince()", "id" => "province_suc_id" . $i]) }}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    {{ Form::label("commune_suc_id" . $i, "Comuna", ["class" => "control-label"]) }}
                    {{ Form::select("commune_suc_id[]", $communes, $subsidiary->commune_suc_id, ["class"=> "form-control", "id" => "commune_suc_id" . $i]) }}
                </div>
            </div>
            <div class="col-md-1">
                <div class="form-group">
                    {{ Form::label("num_suc[]", "N°", ["class" => "control-label"]) }}
                    {{ Form::text("num_suc[]", $subsidiary->num_suc, ["class"=> "form-control text-center"]) }}
                </div>
            </div>
            <div class="col-md-1">
                <div class="form-group">
                    {{ Form::label("lot_suc[]", "Lote", ["class" => "control-label"]) }}
                    {{ Form::text("lot_suc[]", $subsidiary->lot_suc, ["class"=> "form-control text-center"]) }}
                </div>
            </div>
            <div class="col-md-1">
                <div class="form-group">
                    {{ Form::label("ofi_suc[]", "Oficina", ["class" => "control-label"]) }}
                    {{ Form::text("ofi_suc[]", $subsidiary->ofi_suc, ["class"=> "form-control text-center"]) }}
                </div>
            </div>
            <div class="col-md-1">
                <div class="form-group">
                    {{ Form::label("floor_suc[]", "Piso", ["class" => "control-label"]) }}
                    {{ Form::text("floor_suc[]", $subsidiary->floor_suc, ["class"=> "form-control text-center"]) }}
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    {{ Form::label("muni_license_suc[]", "Patente Municipal", ["class" => "control-label"]) }}
                    {{ Form::text("muni_license_suc[]", $subsidiary->muni_license_suc, ["class"=> "form-control text-center"]) }}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    {{ Form::label("phone1_suc[]", "Teléfono 1", ["class" => "control-label"]) }}
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-phone"></i>
                        </div>
                        {{ Form::text("phone1_suc[]", $subsidiary->phone1_suc, ["class"=> "form-control"]) }}
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    {{ Form::label("phone2_suc[]", "Teléfono 2", ["class" => "control-label"]) }}
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-fax"></i>
                        </div>
                        {{ Form::text("phone2_suc[]", $subsidiary->phone2_suc, ["class"=> "form-control"]) }}
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label("email_suc[]", "Email", ["class" => "control-label"]) }}
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-envelope"></i>
                        </div>
                        {{ Form::text("email_suc[]", $subsidiary->email_suc, ["id" => "Subsidiary", "class" => "form-control"]) }}
                    </div>
                </div>
            </div>
        </div>
        <hr/>
    </span>
    <?php $i++; ?>
@endforeach