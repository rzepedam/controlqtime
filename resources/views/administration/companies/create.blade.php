@extends('layout.index')
@section('css')
    <link rel="stylesheet" href="{{ mix('css/administrations/companies/create-edit-custom-companies.css') }}">
@stop
@section('title_header') Crear Nueva Empresa @stop
@section('breadcumb')
    <li><a href="{{ route('administration') }}"><i class="fa fa-th-large"></i> Administración</a></li>
    <li><a href="{{ route('companies.index') }}"><i class="fa fa-building-o"></i> Empresas</a></li>
    <li class="active">Nuevo</li>
@stop
@section('content')

    @include('layout.messages.errors-js')
    {{ Form::open(array('route' => 'companies.store', 'method' => 'POST', 'id' => 'form-submit')) }}

        <div class="panel panel-bordered">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-building-o text-primary"></i> Datos Empresa</h3>
            </div>
            <div class="panel-body">

                @include('administration.companies.partials.fields.data_company')

            </div>
        </div>

        <div class="panel panel-bordered">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-gavel text-success"></i> Datos Representante Legal</h3>
            </div>

            <div class="panel-body">
                <div id="content_legal_representative">

                    @include('administration.companies.partials.fields.data_legal_representative')

                </div>
            </div>

        </div>

        <br />
        <div class="row">
            <div class="col-md-6">
                <a href="{{ route('companies.index') }}">Volver</a>
            </div>

            <div class="col-md-6 pull-right">
                <button id="btnSubmit" class="btn btn-squared btn-primary waves-effect waves-light pull-right"><i class="fa fa-floppy-o"></i> Guardar</button>
            </div>
        </div>

    {{ Form::close() }}

@stop
@section('scripts')
    <script src="{{ mix('js/administrations/companies/create-edit-custom-companies.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".js-example-basic-single").select2({
                placeholder: "Seleccione Áreas...",
            });
        });
    </script>
@stop

