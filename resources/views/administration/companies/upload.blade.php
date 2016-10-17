@extends('layout.index')

@section('title_header') Adjuntar Documentos a Empresa: <span class="text-primary">{{ $id }}</span> @stop

@section('css')

    <link rel="stylesheet" href="{{ elixir('css/upload-common.css') }}">

@stop

@section('breadcumb')
    <li><a href="{{ route('administration') }}"><i class="fa fa-th-large"></i> Administración</a></li>
    <li><a href="{{ route('companies.index') }}"><i class="fa fa-building-o"></i> Empresas</a></li>
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
            <a href="{{ route('companies.index') }}">Volver</a>
        </div>
    </div>

@stop

@section('scripts')

    <script src="{{ elixir('js/upload-common.js') }}"></script>

    <script type="text/javascript">

        $(document).ready(function() {

            /*
             * Rol
             */
            $("#rol").fileinput({
                initialPreview: [
                    @foreach($company->images_rol as $image_rut)
                        "<img style='height:160px' src='{{ Storage::disk('s3')->url($image_rut->path) }}' />",
                    @endforeach
                ],
                initialPreviewConfig: [
                    @foreach($company->images_rol as $image_rut)
                        { caption: "{{ $image_rut->orig_name }}", size: "{{ $image_rut->size }}", url: "{{ route('CompanyDeleteFiles') }}", key: "{{ $image_rut->id }}", extra: { path: "{{ $image_rut->path }}", id: "{{ $id }}", type: "Company" } },
                    @endforeach
                ],
                uploadUrl: "{{ route('CompanyAddImages') }}",
                uploadExtraData:  {
                    company_id: "{{ $id }}",
                    repo_id: '',
                    type: "Company",
                    subClass: "Rol/"
                }
            });

            /*
             * Patent
             */
            $("#patent").fileinput({
                initialPreview: [
                    @foreach($company->images_patent as $image_patent)
                        "<img style='height:160px' src='{{ Storage::disk('s3')->url($image_patent->path) }}' />",
                    @endforeach
                ],
                initialPreviewConfig: [
                    @foreach($company->images_patent as $image_patent)
                        { caption: "{{ $image_patent->orig_name }}", size: "{{ $image_patent->size }}", url: "{{ route('CompanyDeleteFiles') }}", key: "{{ $image_patent->id }}", extra: { path: "{{ $image_patent->path }}", id: "{{ $id }}", type: "Company" } },
                    @endforeach
                ],
                uploadUrl: "{{ route('CompanyAddImages') }}",
                uploadExtraData:  {
                    company_id: "{{ $id }}",
                    repo_id: '',
                    type: "Company",
                    subClass: "Patent/"
                }
            });

        });

    </script>

@stop