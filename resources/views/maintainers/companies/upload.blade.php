@extends('layout.index')

@section('title_header') Seleccione imágenes a adjuntar @stop

@section('css')

    {{ Html::style('assets/css/fileinput.css') }}

@stop

@section('breadcumb')
    <li><a href="#"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li><a href="{{ route('maintainers.companies.index') }}"><i class="fa fa-building-o"></i> Empresas</a></li>
    <li class="active">Subir Archivos</li>
@stop

@section('content')

    <br />
    <br />
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class="box box-solid box-primary">
                <div class="box-header">
                    <h3 class="box-title"><strong>#</strong> Rut Empresa</h3>
                    <button class="btn btn-box-tool pull-right" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
                <div class="box-body">
                    <br />

                    <input id="rut" type="file" class="file-loading" multiple>

                </div>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
    <br />
    <br />

    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class="box box-solid box-warning">
                <div class="box-header">
                    <h3 class="box-title"><strong>#</strong> Patente Municipal</h3>
                    <button class="btn btn-box-tool pull-right" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
                <div class="box-body">
                    <br />

                    <input id="license" type="file" class="file-loading" multiple>

                </div>
            </div>
        </div>
    </div>
    <br />
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <a href="{{ route('maintainers.companies.index') }}">Volver</a>
        </div>
    </div>

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
                    { caption: "{{ $image->orig_name }}", width: "120px", url: "{{ route('maintainers.companies.deleteFiles')  }}", key: {{ $image->id }} },
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
                    type: 'rut'
                },
                uploadIcon: "<i class='fa fa-cloud-upload'></i>",
                uploadLabel: "",
                uploadTitle: "",
                uploadUrl: '{{ url("maintainers/companies/attachFiles") }}'
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
                        { caption: "{{ $image->orig_name }}", width: "120px", url: "{{ route('maintainers.companies.deleteFiles')  }}", key: {{ $image->id }} },
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
                uploadUrl: '{{ url("maintainers/companies/attachFiles") }}'
            });

        });

    </script>

@stop