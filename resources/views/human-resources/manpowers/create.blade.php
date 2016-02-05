@extends('layout.index')

@section('css')
    {{ Html::Style('assets/css/dropzone.css') }}
    {{ Html::Style('assets/css/smart_wizard.css') }}
@stop

@section('title_header') Crear Nuevo Trabajador @stop

@section('breadcumb')
    <li><a href="{{ url('human-resources') }}"><i class="fa fa-users"></i> RR.HH</a></li>
    <li><a href="{{ route('human-resources.manpowers.index') }}"><i class="fa fa-user"></i> Trabajadores</a></li>
    <li class="active">Nuevo</li>
@stop

@section('content')

    <span class="col-md-12 alert alert-danger hide" id="js"></span>

    <div id="wizard" class="swMain">
        <ul>
            <li>
                <a href="#step-1">
                    <label class="stepNumber">1</label>
                    <span class="stepDesc">
                        Información<br />
                        <small>Personal</small>
                    </span>
                </a>
            </li>
            <li>
                <a href="#step-2">
                    <label class="stepNumber">2</label>
                    <span class="stepDesc">
                        Declaración<br />
                        <small>de Salud</small>
                    </span>
                </a>
            </li>
            <li>
                <a href="#step-3">
                    <label class="stepNumber">3</label>
                    <span class="stepDesc">
                        Competencias<br />
                        <small>Laborales</small>
                    </span>
                </a>
            </li>
        </ul>
        <div id="step-1">

            @include('human-resources.manpowers.partials.step1.personal_data')

        </div>
        <div id="step-2">

            @include('human-resources.manpowers.partials.step2.health')

        </div>
        <div id="step-3">

            @include('human-resources.manpowers.partials.step3.job_skills')

        </div>
    </div>

@stop

@section('scripts')

    {{ Html::script('assets/js/jquery.inputmask.js') }}
    {{ Html::script('assets/js/dropzone.js') }}
    {{ Html::script('assets/js/config.js') }}
    {{ Html::script('assets/js/jquery.smartWizard.js') }}

    <script type="text/javascript">

        $(document).ready(function(){

            $('#wizard').smartWizard({

            });

        });

    </script>
@stop