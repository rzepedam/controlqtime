@extends('layout.index')

@section('title_header') Adjuntar imágenes a Empresa: <span class="text-primary">{{ $id }}</span> @stop

@section('css')

    {{ Html::style('assets/css/fileinput.css') }}

@stop

@section('breadcumb')
    <li><a href="javascript:void(0)"><i class="fa fa-th-large"></i> Administración</a></li>
    <li><a href="{{ route('administration.companies.index') }}"><i class="fa fa-building-o"></i> Empresas</a></li>
    <li class="active">Subir Archivos</li>
@stop

@section('content')

    <br />
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <strong>#</strong> Rol Empresa
                    </h3>
                </div>
                <div class="panel-body">

                    <br />
                    <input id="rol" type="file" class="file-loading" multiple>

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
                    <input id="patent" type="file" class="file-loading" multiple>

                </div>
            </div>
        </div>
    </div>
    <br />
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <a href="{{ route('administration.companies.index') }}">Volver</a>
        </div>
    </div>

@stop

@section('scripts')

    {{ Html::script('assets/js/fileinput.js') }}
    {{ Html::script('assets/js/config.js') }}

    <script>

        $(document).ready(function() {

            $("#rol").fileinput({
                initialPreview: [
                    @foreach($company->imageRolCompanies as $image_rut)
                            "<img style='height:160px' src='{{ asset("/storage/company/" . $id . "/rol/" . $image_rut->name) }}' />",
                    @endforeach
                ],
                initialPreviewConfig: [
                    @foreach($company->imageRolCompanies as $image_rut)
                        { caption: "{{ $image_rut->orig_name }}", width: "120px", url: "{{ route('administration.companies.deleteFiles') }}", key: "{{ $image_rut->id }}", extra: { img_name: "{{ $image_rut->name }}", id: "{{ $id }}", type: "rol" } },
                    @endforeach
                ],
                uploadUrl: "{{ route('administration.companies.addImages') }}",
                uploadExtraData:  {
                    id: "{{ $id }}",
                    type: "rol"
                }
            });

            $("#patent").fileinput({
                initialPreview: [
                    @foreach($company->imagePatentCompanies as $image_patent)
                            "<img style='height:160px' src='{{ asset("/storage/company/" . $id . "/patent/" . $image_patent->name) }}' />",
                    @endforeach
                ],
                initialPreviewConfig: [
                    @foreach($company->imagePatentCompanies as $image_patent)
                        { caption: "{{ $image_patent->orig_name }}", width: "120px", url: "{{ route('administration.companies.deleteFiles') }}", key: "{{ $image_patent->id }}", extra: { img_name: "{{ $image_patent->name }}", id: "{{ $id }}", type: "patent" } },
                    @endforeach
                ],
                uploadUrl: "{{ route('administration.companies.addImages') }}",
                uploadExtraData:  {
                    id: "{{ $id }}",
                    type: "patent"
                }
            });

        });

    </script>

@stop