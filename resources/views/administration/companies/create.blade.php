@extends('layout.index')

@section('css')

    <link rel="stylesheet" href="{{ elixir('css/administrations/companies/create-companies.css') }}">

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

    {{ Form::open(array('route' => 'administration.companies.store', 'method' => 'POST', 'id' => 'form-company')) }}

        <div class="panel panel-bordered">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-building-o text-primary"></i> Datos Empresa</h3>
            </div>
            <div class="panel-body">

                @include('administration.companies.partials.create.data_company')

            </div>
        </div>

        <div class="panel panel-bordered">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-users text-success"></i> Datos Representante Legal</h3>
            </div>

            <div class="panel-body">
                <div id="content_legal_representative">

                    @include('administration.companies.partials.create.data_legal_representative')

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
            <button id="btnSubmitCompany" class="btn btn-squared btn-primary btn-lg waves-effect waves-light pull-right"><i class="fa fa-floppy-o"></i> Guardar</button>
        </div>
    </div>

@stop

@section('scripts')

    <script src="{{ elixir('js/administrations/companies/create-companies.js') }}"></script>

    <script type="text/javascript">

        $(document).ready(function(){

            $('#btnSubmitCompany').click(function(e) {

                e.preventDefault();

                var formCompany         = $('#form-company');
                var action              = $('#form-company').attr('action');
                var button              = $(this);

                button.html('<i class="fa fa-refresh fa-spin fa-fw"></i>').css({ width: '122px' });
                $.post( action,
                        formCompany.serialize(),
                        function(response) {
                    if (response.success) {
                        window.location.href = response.url;
                    }
                }).fail(function(response) {
                    button.html('<i class="fa fa-floppy-o"></i> Guardar');
                    var errors = $.parseJSON(response.responseText);
                    $.each(errors, function (index, value) {
                        $('#js').html('<i class="fa fa-times"></i> ' + value).removeClass('hide');
                        $('#' + index).focus();
                        return false;
                    });
                });
            });

        });

    </script>

@stop

