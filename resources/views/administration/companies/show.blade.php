@extends('layout.index')

@section('css')

    <link rel="stylesheet" href="{{ mix('css/show-with-image-common.css') }}">

@stop

@section('title_header') Detalle Empresa : <span class="text-primary">{{ $company->id }}</span> @stop

@section('breadcumb')
    <li><a href="{{ route('administration') }}"><i class="fa fa-th-large"></i> Administración</a></li>
    <li><a href="{{ route('companies.index') }}"><i class="fa fa-building-o"></i> Empresas</a></li>
    <li class="active">Ver</li>
@stop

@section('content')

<div class="nav-tabs-horizontal">
    <ul class="nav nav-tabs" data-plugin="nav-tabs" role="tablist">
        <li class="active" role="presentation"><a data-toggle="tab" href="#tab_1" aria-controls="tab_1" role="tab"><i class="fa fa-building" aria-hidden="true"></i> Datos Empresa</a></li>
        <li role="presentation"><a data-toggle="tab" href="#tab_2" aria-controls="tab_2" role="tab"><i class="fa fa-gavel" aria-hidden="true"></i> Representante Legal</a></li>
        <li role="files_attach"><a data-toggle="tab" href="#tab_3" aria-controls="tab_3" role="tab"><i class="fa fa-file-text-o" aria-hidden="true"></i> Documentos Adjuntos <span class="badge badge-warning up">{{ $company->num_total_images }}</span></a></li>
    </ul>
    <div class="tab-content padding-top-20">
        <div class="tab-pane active" id="tab_1" role="tabpanel">

            @include('administration.companies.partials.show.company')

        </div>
        <div class="tab-pane" id="tab_2" role="tabpanel">

            @include('administration.companies.partials.show.legal_representative')

        </div>
        <div class="tab-pane" id="tab_3" role="tabpanel">

            @include('administration.companies.partials.show.files_attach')

        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <a href="{{ route('companies.index') }}">Volver</a>
    </div>
</div>

@stop

@section('scripts')

    <script src="{{ mix('js/show-with-image-common.js') }}"></script>

@stop