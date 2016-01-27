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



@stop

@section('scripts')
    {{ Html::script('assets/js/jquery.inputmask.js') }}
@stop