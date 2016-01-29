@extends('layout.index')

@section('css')
    {{ Html::style('me/css/style.css') }}
    {{ Html::style('assets/css/jquery-validate/screen.css') }}
    {{ Html::Style('assets/css/bwizard-steps.css') }}
@stop

@section('title_header') Crear Nuevo Trabajador @stop

@section('breadcumb')
    <li><a href="{{ url('human-resources') }}"><i class="fa fa-users"></i> RR.HH</a></li>
    <li><a href="{{ route('human-resources.manpowers.index') }}"><i class="fa fa-user"></i> Trabajadores</a></li>
    <li class="active">Nuevo</li>
@stop

@section('content')

    <div id="rootwizard" class="tabbable tabs-left">
        <ul>
            <li><a href="#tab1" data-toggle="tab"><i id="paso1" class="fa fa-clock-o"></i> Paso 1</a></li>
            <li><a href="#tab2" data-toggle="tab"><i id="paso2" class="fa fa-clock-o"></i> Paso 2</a></li>
            <li><a href="#tab3" data-toggle="tab"><i id="paso3" class="fa fa-clock-o"></i> Paso 3</a></li>
            <li><a href="#tab4" data-toggle="tab"><i id="paso4" class="fa fa-clock-o"></i> Paso 4</a></li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane" id="tab1">
                <br>
                @include('human-resources.manpowers.partials.step1.personal_data')
            </div>
            <div class="tab-pane" id="tab2">
                <br>
                @include('human-resources.manpowers.partials.step2.autentication')
            </div>
            <div class="tab-pane" id="tab3">
                <br>
                @include('human-resources.manpowers.partials.step3.health')
            </div>
            <div class="tab-pane" id="tab4">
                <br>
                @include('human-resources.manpowers.partials.step4.job_skills')
            </div>
        </div>
    </div>

@stop

@section('scripts')
    {{ Html::script('assets/js/jquery.inputmask.js') }}
    {{ Html::script('assets/js/jquery.bootstrap.wizard.js') }}
    {{-- Html::script('assets/js/jquery.validate.js') --}}
    {{ Html::script('me/js/manpowers/twitterBootstrapWizard.js') }}
    {{-- Html::script('assets/js/messages_es.js') --}}
    {{ Html::script('/me/js/manpowers/disabilities.js') }}
@stop