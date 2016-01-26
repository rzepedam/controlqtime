@extends('layout.index')

@section('css')
    {{ Html::style('me/css/style.css') }}
@stop

@section('title_header') Crear Nuevo Trabajador @stop

@section('breadcumb')
    <li><a href="{{ url('human-resources') }}"><i class="fa fa-users"></i> RR.HH</a></li>
    <li><a href="{{ route('human-resources.manpowers.index') }}"><i class="fa fa-user"></i> Trabajadores</a></li>
    <li class="active">Nuevo</li>
@stop

@section('content')

    @include('human-resources.manpowers.partials.step_sidebar')

    <div class="box box-solid box-default">
        <div class="box-header">
            <h3 class="box-title">Datos Personales</h3>
        </div><!-- /.box-header -->
        <div class="box-body">

            {{ Form::open(['route' => 'human-resources.manpowers.store', 'method' => 'POST', 'role' => 'form', 'id' => 'step1']) }}

                @include('human-resources.manpowers.partials.step1.personal_data')


            {{ Form::close() }}
        </div><!-- /.box-body -->
    </div>

@stop

@section('scripts')
    {{ Html::script('assets/js/jquery.inputmask.js') }}
    {{ Html::script('me/js/step-form.js') }}
@stop