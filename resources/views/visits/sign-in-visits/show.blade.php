@extends('layout.index')

@section('css')

    <link rel="stylesheet" href="{{ elixir('css/visits/sign-in-visits/show-custom-sign-in-visits.css') }}">

@endsection

@section('title_header') Ver Visita: <span class="text-primary">{{ $signInVisit->id }}</span> @stop

@section('breadcumb')
    <li><a href="{{ route('visits') }}"><i class="fa fa-tasks" aria-hidden="true"></i> Registro Visitas</a></li>
    <li><a href="{{ route('sign-in-visits.index') }}"><i class="fa fa-id-card-o" aria-hidden="true"></i> Visitas</a></li>
    <li class="active">Ver</li>
@stop

@section('content')

    <div class="nav-tabs-horizontal">
        <ul class="nav nav-tabs" data-plugin="nav-tabs" role="tablist">
            <li class="active" role="presentation"><a data-toggle="tab" href="#tab_1" aria-controls="tab_1" role="tab"><i class="fa fa-pencil"></i> Información Personal</a></li>
            <li role="presentation"><a data-toggle="tab" href="#tab_2" aria-controls="tab_2" role="tab"><i class="fa fa-picture-o"></i> Imágenes Adjuntas</a></li>
        </ul>
        <div class="tab-content padding-top-20">
            <div class="tab-pane active" id="tab_1" role="tabpanel">

                @include('visits.sign-in-visits.show.info_personal')

            </div>
            <div class="tab-pane" id="tab_2" role="tabpanel">

                @include('visits.sign-in-visits.show.images')

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('sign-in-visits.index') }}">Volver</a>
        </div>
    </div>

@stop

@section('scripts')

    <script src="{{ elixir('js/visits/sign-in-visits/show-custom-sign-in-visits.js') }}"></script>

@stop