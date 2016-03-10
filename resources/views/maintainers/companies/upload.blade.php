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

    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tab_1" data-toggle="tab">Subir imágenes</a></li>
            <li><a href="#tab_2" data-toggle="tab">Imágenes existentes</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="tab_1">
                <br />
                <br />
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <div class="box box-solid box-primary">
                            <div class="box-header">
                                <h3 class="box-title">Rut Empresa</h3>
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
                        <div class="box box-solid box-success">
                            <div class="box-header">
                                <h3 class="box-title">Patente Municipal</h3>
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
                <br />
            </div>

            <div class="tab-pane" id="tab_2">

            </div>
        </div>
    </div>
    <br />
    <div class="row">
        <div class="col-md-12">
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

                initialPreview: [
                    @foreach($images as $image)
                        "<img style='height:160px' src='{{ asset("/storage/companies/2/rut/" . $image->name) }}' />",
                    @endforeach
                ],

                initialPreviewConfig: [

                    @foreach($images as $image)
                        {caption: "{{ $image->orig_name }}", width: "120px", url: "{{ route('maintainers.companies.deleteFiles')  }}", key: {{ $image->id }} },
                    @endforeach
                ],

                uploadUrl: '{{ url("maintainers/companies/attachFiles") }}',
                language: "es",
                browseClass: "btn btn-primary mitooltip",
                browseLabel: "Seleccione..",
                browseIcon: "<i class='fa fa-folder-open'></i>",
                minFileCount: 1,
                removeClass: "btn btn-danger",
                removeLabel: "",
                removeTitle: "",
                removeIcon: "<i class='glyphicon glyphicon-trash'></i> ",
                uploadClass: "btn btn-info",
                uploadLabel: "",
                uploadTitle: "",
                uploadIcon: "<i class='fa fa-cloud-upload'></i>",
                uploadAsync: true,
                uploadExtraData:  {
                    id: {{ $id }}
                },
                deleteExtraData: {
                    company: {{ $id }},
                    type: 'rut'
                }
            });

            $("#license").fileinput({

                initialPreview: [
                    @foreach($images as $image)
                        "<img style='height:160px' src='{{ asset("/storage/companies/2/rut/" . $image->name) }}' />",
                    @endforeach
                ],

                initialPreviewConfig: [

                    @foreach($images as $image)
                        {caption: "{{ $image->orig_name }}", width: "120px", url: "{{ route('maintainers.companies.deleteFiles')  }}", key: {{ $image->id }} },
                    @endforeach
                ],

                uploadUrl: '{{ url("maintainers/companies/attachFiles") }}',
                language: "es",
                browseClass: "btn btn-primary mitooltip",
                browseLabel: "Seleccione..",
                browseIcon: "<i class='fa fa-folder-open'></i>",
                minFileCount: 1,
                removeClass: "btn btn-danger",
                removeLabel: "",
                removeTitle: "",
                removeIcon: "<i class='glyphicon glyphicon-trash'></i> ",
                uploadClass: "btn btn-info",
                uploadLabel: "",
                uploadTitle: "",
                uploadIcon: "<i class='fa fa-cloud-upload'></i>",
                uploadAsync: true,
                uploadExtraData:  {
                    id: {{ $id }}
                },
                deleteExtraData: {
                    company: {{ $id }},
                    type: 'rut'
                }
            });

        });

    </script>

@stop