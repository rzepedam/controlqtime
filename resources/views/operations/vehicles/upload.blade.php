@extends('layout.index')

@section('title_header') Adjuntar imágenes a Vehículo: <span class="text-primary">{{ $id }}</span> @stop

@section('css')

    <link rel="stylesheet" href="{{ mix('css/upload-common.css') }}">

@stop

@section('breadcumb')
    <li><a href="{{ route('operations') }}"><i class="fa fa-map-pin"></i> Operaciones</a></li>
    <li><a href="{{ route('vehicles.index') }}"><i class="fa fa-bus"></i> Vehículos</a></li>
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
            <a href="{{ route('vehicles.index') }}">Volver</a>
        </div>
    </div>

@stop

@section('scripts')

    <script src="{{ mix('js/upload-common.js') }}"></script>

    <script>

        $(document).ready(function() {

            /*
             * Padron
             */
            $("#padron").fileinput({
                initialPreview: [
                    @foreach($vehicle->images_padron as $image_padron)
                        "<img style='height:160px' src='{{ Storage::disk('s3')->url($image_padron->path) }}' />",
                    @endforeach
                ],
                initialPreviewConfig: [
                    @foreach($vehicle->images_padron as $image_padron)
                        { caption: "{{ $image_padron->orig_name }}", size: "{{ $image_padron->size }}", url: "{{ route('VehicleDeleteFiles') }}", key: "{{ $image_padron->id }}", extra: { path: "{{ $image_padron->path }}", id: "{{ $id }}", type: "Vehicle" } },
                    @endforeach
                ],
                uploadUrl: "{{ route('VehicleAddImages') }}",
                uploadExtraData:  {
                    vehicle_id: "{{ $id }}",
                    repo_id: '',
                    type: "Vehicle",
                    subClass: "Padron/"
                }
            });

            $("#obligatory_insurance").fileinput({
                initialPreview: [
                    @foreach($vehicle->images_obligatory_insurance as $image_obl_ins)
                        "<img style='height:160px' src='{{ Storage::disk('s3')->url($image_obl_ins->path) }}' />",
                    @endforeach
                ],
                initialPreviewConfig: [
                    @foreach($vehicle->images_obligatory_insurance as $image_obl_ins)
                        { caption: "{{ $image_obl_ins->orig_name }}", size: "{{ $image_obl_ins->size }}", url: "{{ route('VehicleDeleteFiles') }}", key: "{{ $image_obl_ins->id }}", extra: { path: "{{ $image_obl_ins->path }}", id: "{{ $id }}", type: "Vehicle" } },
                    @endforeach
                ],
                uploadUrl: "{{ route('VehicleAddImages') }}",
                uploadExtraData:  {
                    vehicle_id: "{{ $id }}",
                    repo_id: '',
                    type: "Vehicle",
                    subClass: "ObligatoryInsurance/"
                }
            });

            $("#circulation_permit").fileinput({
                initialPreview: [
                    @foreach($vehicle->images_circulation_permit as $image_cir_permit)
                        "<img style='height:160px' src='{{ Storage::disk('s3')->url($image_cir_permit->path) }}' />",
                    @endforeach
                ],
                initialPreviewConfig: [
                    @foreach($vehicle->images_circulation_permit as $image_cir_permit)
                        { caption: "{{ $image_cir_permit->orig_name }}", size: "{{ $image_cir_permit->size }}", url: "{{ route('VehicleDeleteFiles') }}", key: "{{ $image_cir_permit->id }}", extra: { path: "{{ $image_cir_permit->path }}", id: "{{ $id }}", type: "Vehicle" } },
                    @endforeach
                ],
                uploadUrl: "{{ route('VehicleAddImages') }}",
                uploadExtraData:  {
                    vehicle_id: "{{ $id }}",
                    repo_id: '',
                    type: "Vehicle",
                    subClass: "CirculationPermit/"
                }
            });

        });

    </script>

@stop