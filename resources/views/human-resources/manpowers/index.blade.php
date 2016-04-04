@extends('layout.index')

@section('css')

    {{ Html::style('assets/css/toastr.css') }}

@stop

@section('title_header') Listado de Trabajadores
    <br>
    <a href="{{ route('human-resources.manpowers.create') }}" class="btn btn-primary waves-effect waves-light"><i class="fa fa-plus"></i> Crear Nuevo Trabajador</a>
@stop

@section('breadcumb')
    <li><a href="javascript:void(0)"><i class="fa fa-street-view"></i> RR.HH</a></li>
    <li class="active">Trabajadores</li>
@stop

@section('content')

    @if($manpowers->count())

        @include('human-resources.manpowers.partials.table')

    @else

        <h3 class="text-center">No se han encontrado Trabajadores</h3>

    @endif

    {{ $manpowers->links() }}

@stop

@section('scripts')

    {{ Html::script('assets/js/toastr.js') }}
    {{ Html::script('assets/js/components/toastr.js') }}

    <script>

        $(document).ready(function(){


            /**************************************************
             ************** Initialize components **************
             **************************************************/

            $('.mitooltip').tooltip();



        });

    </script>

@stop