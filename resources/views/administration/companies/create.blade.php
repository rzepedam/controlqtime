@extends('layout.index')

@section('css')

    <link rel="stylesheet" href="{{ elixir('css/administrations/companies/create-edit-custom-companies.css') }}">

@stop

@section('title_header') Crear Nueva Empresa @stop

@section('breadcumb')
    <li><a href="{{ route('administration') }}"><i class="fa fa-th-large"></i> Administración</a></li>
    <li><a href="{{ route('administration.companies.index') }}"><i class="fa fa-building-o"></i> Empresas</a></li>
    <li class="active">Nuevo</li>
@stop

@section('content')

    {{-- Show Errors Validations --}}
    <div class="clearfix">
        <div class="col-md-12 col-xs-12 alert alert-danger alert-dismissible hide" role="alert" id="js">
        </div>
    </div>
    {{-- End Show Errors --}}

    {{ Form::open(array('route' => 'administration.companies.store', 'method' => 'POST', 'id' => 'form-submit')) }}

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

    {{ Form::close() }}

    <br />
    <div class="row">
        <div class="col-md-6">
            <a href="{{ route('administration.companies.index') }}">Volver</a>
        </div>

        <div class="col-md-6 pull-right">
            <button id="btnSubmit" class="btn btn-squared btn-primary btn-lg waves-effect waves-light pull-right"><i class="fa fa-floppy-o"></i> Guardar</button>
        </div>
    </div>

@stop

@section('scripts')

    <script src="{{ elixir('js/administrations/companies/create-edit-custom-companies.js') }}"></script>

@stop

