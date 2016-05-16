@extends('layout.index')

@section('title_header') Adjuntar imágenes a Vehículo: <span class="text-primary">{{ $id }}</span> @stop

@section('css')

    {{ Html::style('assets/css/fileinput.css') }}

@stop

@section('breadcumb')
    <li><a href="javascript:void(0)"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li><a href="{{ route('maintainers.vehicles.index') }}"><i class="fa fa-building-o"></i> Vehículos</a></li>
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
            <a href="{{ route('maintainers.vehicles.index') }}">Volver</a>
        </div>
    </div>

@stop

@section('scripts')

    {{ Html::script('assets/js/fileinput.js') }}
    {{ Html::script('assets/js/config.js') }}

    <script>

        $(document).ready(function() {

            $("#padron").fileinput({
                initialPreview: [
                    @foreach($vehicle->imagePadrones as $image_padron)
                        "<img style='height:160px' src='{{ asset("/storage/vehicle/" . $id . "/padron/" . $image_padron->name) }}' />",
                    @endforeach
                ],
                initialPreviewConfig: [
                    @foreach($vehicle->imagePadrones as $image_padron)
                        { caption: "{{ $image_padron->orig_name }}", width: "120px", url: "{{ route('maintainers.vehicles.deleteFiles') }}", key: "{{ $image_padron->id }}", extra: { img_name: "{{ $image_padron->name }}", id: "{{ $id }}", type: "padron" } },
                    @endforeach
                ],
                uploadUrl: "{{ route('maintainers.vehicles.addImages') }}",
                uploadExtraData:  {
                    id: "{{ $id }}",
                    type: "padron"
                }
            });

            $("#obligatory_insurance").fileinput({
                initialPreview: [
                    @foreach($vehicle->imageObligatoryInsurances as $image_obl_ins)
                        "<img style='height:160px' src='{{ asset("/storage/vehicle/" . $id . "/obligatory_insurance/" . $image_obl_ins->name) }}' />",
                    @endforeach
                ],
                initialPreviewConfig: [
                    @foreach($vehicle->imageObligatoryInsurances as $image_obl_ins)
                        { caption: "{{ $image_obl_ins->orig_name }}", width: "120px", url: "{{ route('maintainers.vehicles.deleteFiles') }}", key: "{{ $image_obl_ins->id }}", extra: { img_name: "{{ $image_obl_ins->name }}", id: "{{ $id }}", type: "obligatory_insurance" } },
                    @endforeach
                ],
                uploadUrl: "{{ route('maintainers.vehicles.addImages') }}",
                uploadExtraData:  {
                    id: "{{ $id }}",
                    type: "obligatory_insurance"
                }
            });

            $("#patent").fileinput({
                initialPreview: [
                    @foreach($vehicle->imagePatents as $image_patent)
                        "<img style='height:160px' src='{{ asset("/storage/vehicle/" . $id . "/patent/" . $image_patent->name) }}' />",
                    @endforeach
                ],
                initialPreviewConfig: [
                    @foreach($vehicle->imagePatents as $image_patent)
                        { caption: "{{ $image_patent->orig_name }}", width: "120px", url: "{{ route('maintainers.vehicles.deleteFiles') }}", key: "{{ $image_patent->id }}", extra: { img_name: "{{ $image_patent->name }}", id: "{{ $id }}", type: "patent" } },
                    @endforeach
                ],
                uploadUrl: "{{ route('maintainers.vehicles.addImages') }}",
                uploadExtraData:  {
                    id: "{{ $id }}",
                    type: "patent"
                }
            });

            $("#circulation_permit").fileinput({
                initialPreview: [
                    @foreach($vehicle->imageCirculationPermits as $image_cir_permit)
                        "<img style='height:160px' src='{{ asset("/storage/vehicle/" . $id . "/circulation_permit/" . $image_cir_permit->name) }}' />",
                    @endforeach
                ],
                initialPreviewConfig: [
                    @foreach($vehicle->imageCirculationPermits as $image_cir_permit)
                        { caption: "{{ $image_cir_permit->orig_name }}", width: "120px", url: "{{ route('maintainers.vehicles.deleteFiles') }}", key: "{{ $image_cir_permit->id }}", extra: { img_name: "{{ $image_cir_permit->name }}", id: "{{ $id }}", type: "circulation_permit" } },
                    @endforeach
                ],
                uploadUrl: "{{ route('maintainers.vehicles.addImages') }}",
                uploadExtraData:  {
                    id: "{{ $id }}",
                    type: "circulation_permit"
                }
            });

        });

    </script>

@stop