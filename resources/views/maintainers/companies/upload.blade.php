@extends('layout.index')

@section('title_header') Seleccione imágenes a adjuntar @stop

@section('css')

    {{ Html::style('assets/css/fileinput.css') }}

@stop

@section('breadcumb')
    <li><a href="javascript:void(0)"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li><a href="{{ route('maintainers.companies.index') }}"><i class="fa fa-building-o"></i> Empresas</a></li>
    <li class="active">Subir Archivos</li>
@stop

@section('content')

    <br />
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <strong>#</strong> Rut Empresa
                    </h3>
                </div>
                <div class="panel-body">

                    <br />
                    <input id="rut" type="file" class="file-loading" multiple>

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
                        <strong>#</strong> Patente Municipal
                    </h3>
                </div>
                <div class="panel-body">

                    <br />
                    <input id="license" type="file" class="file-loading" multiple>

                </div>
            </div>
        </div>
    </div>
    <br />
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <a href="{{ route('maintainers.companies.index') }}">Volver</a>
        </div>
    </div>
    <br />
    <br />

@stop

@section('scripts')

    {{ Html::script('assets/js/fileinput.js') }}
    {{ Html::script('assets/js/fileinput_locale_es.js') }}
    {{ Html::script('assets/js/config.js') }}

    <script>

        $(document).ready(function(){

            $("#rut").fileinput({

                allowedFileExtensions: ["jpg", "png", "jpeg"],
                browseClass: "btn btn-primary mitooltip",
                browseLabel: "Seleccione..",
                browseIcon: "<i class='fa fa-folder-open'></i>",
                deleteExtraData: {
                    company: {{ $id }},
                    type: 'rut'
                },

                initialPreview: [
                    @foreach($imagesRut as $image)
                            "<img style='height:160px' src='{{ asset("/storage/companies/" . $id . "/rut/" . $image->name) }}' />",
                    @endforeach
                ],

                initialPreviewConfig: [
                    @foreach($imagesRut as $image)
                        { caption: "{{ $image->orig_name }}", width: "120px", url: "{{ route('deleteFiles')  }}", key: {{ $image->id }} },
                    @endforeach
                ],

                language: "es",
                minFileCount: 1,
                overwriteInitial: false,
                removeClass: "btn btn-danger",
                removeLabel: "",
                removeTitle: "",
                removeIcon: "<i class='fa fa-trash'></i>",
                uploadAsync: true,
                uploadClass: "btn btn-info",
                uploadExtraData:  {
                    id: {{ $id }},
                    type: 'rut'
                },
                uploadIcon: "<i class='fa fa-cloud-upload'></i>",
                uploadLabel: "",
                uploadTitle: "",
                uploadUrl: '{{ route("attachFiles_added") }}'
            });

            $("#license").fileinput({

                allowedFileExtensions: ["jpg", "png", "gif"],
                browseClass: "btn btn-primary mitooltip",
                browseLabel: "Seleccione..",
                browseIcon: "<i class='fa fa-folder-open'></i>",
                deleteExtraData: {
                    company: {{ $id }},
                    type: 'license'
                },

                initialPreview: [
                    @foreach($imagesLicense as $image)
                            "<img style='height:160px' src='{{ asset("/storage/companies/" . $id . "/license/" . $image->name) }}' />",
                    @endforeach
                ],

                initialPreviewConfig: [
                    @foreach($imagesLicense as $image)
                        { caption: "{{ $image->orig_name }}", width: "120px", url: "{{ route('deleteFiles')  }}", key: {{ $image->id }} },
                    @endforeach
                ],

                language: "es",
                minFileCount: 1,
                overwriteInitial: false,
                removeClass: "btn btn-danger",
                removeLabel: "",
                removeTitle: "",
                removeIcon: "<i class='glyphicon glyphicon-trash'></i> ",
                uploadAsync: true,
                uploadClass: "btn btn-info",
                uploadExtraData:  {
                    id: {{ $id }},
                    type: 'license'
                },
                uploadIcon: "<i class='fa fa-cloud-upload'></i>",
                uploadLabel: "",
                uploadTitle: "",
                uploadUrl: '{{ route("attachFiles_added") }}'
            });

        });

    </script>

@stop