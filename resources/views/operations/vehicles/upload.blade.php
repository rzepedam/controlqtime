@extends('layout.index')

@section('title_header') Adjuntar imágenes a Vehículo: <span class="text-primary">{{ $id }}</span> @stop

@section('css')

    <link rel="stylesheet" href="{{ elixir('css/upload-common.css') }}">

@stop

@section('breadcumb')
    <li><a href="{{ route('operations') }}"><i class="fa fa-map-pin"></i> Operaciones</a></li>
    <li><a href="{{ route('operations.vehicles.index') }}"><i class="fa fa-bus"></i> Vehículos</a></li>
    <li class="active">Subir Archivos</li>
@stop

@section('content')

    <br />
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <strong>#</strong> Padrón
                    </h3>
                </div>
                <div class="panel-body">

                    <br />
                    <input id="padron" type="file" class="file-loading" multiple>

                </div>
            </div>
        </div>
    </div>
    <br />
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <strong>#</strong> Seguro Obligatorio
                    </h3>
                </div>
                <div class="panel-body">

                    <br />
                    <input id="obligatory_insurance" type="file" class="file-loading" multiple>

                </div>
            </div>
        </div>
    </div>
    <br />
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <strong>#</strong> Patente Vehículo
                    </h3>
                </div>
                <div class="panel-body">

                    <br />
                    <input id="patent" type="file" class="file-loading" multiple>

                </div>
            </div>
        </div>
    </div>
    <br />
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <strong>#</strong> Permiso de Circulación
                    </h3>
                </div>
                <div class="panel-body">

                    <br />
                    <input id="circulation_permit" type="file" class="file-loading" multiple>

                </div>
            </div>
        </div>
    </div>
    <br />
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <a href="{{ route('operations.vehicles.index') }}">Volver</a>
        </div>
    </div>

@stop

@section('scripts')

    <script src="{{ elixir('js/upload-common.js') }}"></script>

    <script>

        $(document).ready(function() {

            $("#padron").fileinput({
                initialPreview: [
                    @foreach($vehicle->imagePadrones as $image_padron)
                        "<img style='height:160px' src='{{ $image_padron->path }}' />",
                    @endforeach
                ],
                initialPreviewConfig: [
                    @foreach($vehicle->imagePadrones as $image_padron)
                        { caption: "{{ $image_padron->orig_name }}", size: "{{ $image_padron->size }}", url: "{{ route('operations.vehicles.deleteFiles') }}", key: "{{ $image_padron->id }}", extra: { path: "{{ $image_padron->path }}", id: "{{ $id }}", type: "PadronVehicle" } },
                    @endforeach
                ],
                uploadUrl: "{{ route('operations.vehicles.addImages') }}",
                uploadExtraData:  {
                    vehicle_id: "{{ $id }}",
                    type: "PadronVehicle"
                }
            });

            $("#obligatory_insurance").fileinput({
                initialPreview: [
                    @foreach($vehicle->imageObligatoryInsurances as $image_obl_ins)
                        "<img style='height:160px' src='{{ $image_obl_ins->path }}' />",
                    @endforeach
                ],
                initialPreviewConfig: [
                    @foreach($vehicle->imageObligatoryInsurances as $image_obl_ins)
                        { caption: "{{ $image_obl_ins->orig_name }}", size: "{{ $image_obl_ins->size }}", url: "{{ route('operations.vehicles.deleteFiles') }}", key: "{{ $image_obl_ins->id }}", extra: { path: "{{ $image_obl_ins->path }}", id: "{{ $id }}", type: "ObligatoryInsuranceVehicle" } },
                    @endforeach
                ],
                uploadUrl: "{{ route('operations.vehicles.addImages') }}",
                uploadExtraData:  {
                    vehicle_id: "{{ $id }}",
                    type: "ObligatoryInsuranceVehicle"
                }
            });

            $("#patent").fileinput({
                initialPreview: [
                    @foreach($vehicle->imagePatents as $image_patent)
                        "<img style='height:160px' src='{{ $image_patent->path }}' />",
                    @endforeach
                ],
                initialPreviewConfig: [
                    @foreach($vehicle->imagePatents as $image_patent)
                        { caption: "{{ $image_patent->orig_name }}", size: "{{ $image_patent->size }}", url: "{{ route('operations.vehicles.deleteFiles') }}", key: "{{ $image_patent->id }}", extra: { path: "{{ $image_patent->path }}", id: "{{ $id }}", type: "PatentVehicle" } },
                    @endforeach
                ],
                uploadUrl: "{{ route('operations.vehicles.addImages') }}",
                uploadExtraData:  {
                    vehicle_id: "{{ $id }}",
                    type: "PatentVehicle"
                }
            });

            $("#circulation_permit").fileinput({
                initialPreview: [
                    @foreach($vehicle->imageCirculationPermits as $image_cir_permit)
                        "<img style='height:160px' src='{{ $image_cir_permit->path }}' />",
                    @endforeach
                ],
                initialPreviewConfig: [
                    @foreach($vehicle->imageCirculationPermits as $image_cir_permit)
                        { caption: "{{ $image_cir_permit->orig_name }}", size: "{{ $image_cir_permit->size }}", url: "{{ route('operations.vehicles.deleteFiles') }}", key: "{{ $image_cir_permit->id }}", extra: { path: "{{ $image_cir_permit->path }}", id: "{{ $id }}", type: "CirculationPermitVehicle" } },
                    @endforeach
                ],
                uploadUrl: "{{ route('operations.vehicles.addImages') }}",
                uploadExtraData:  {
                    vehicle_id: "{{ $id }}",
                    type: "CirculationPermitVehicle"
                }
            });

        });

    </script>

@stop