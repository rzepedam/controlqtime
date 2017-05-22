@extends('layout.index')

@section('css')



@endsection

@section('title_header') Editar Institución: <span class="text-primary">{{ $institution->id }}</span> @stop

@section('breadcumb')
    <li><a href="{{ route('maintainers') }}"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li><a href="{{ route('institutions.index') }}"><i class="fa fa-graduation-cap"></i> Instituciones</a></li>
    <li class="active">Editar</li>
@stop

@section('content')

    @include('layout.messages.errors-js')

    <div class="panel">

        {{ Form::model($institution, array('route' => array('institutions.update', $institution), 'method' => 'PUT', 'id' => 'form-submit')) }}

            <div class="panel-body">

                @include('maintainers.institutions.partials.fields')

            </div>
            <br />
            <div class="panel-footer">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('institutions.index') }}">Volver</a>
                        <button id="btnSubmit" type="submit" class="btn btn-squared btn-primary waves-effect waves-light pull-right"><i class="fa fa-refresh"></i> Actualizar</button>
                    </div>
                </div>
            </div>

        {{ Form::close() }}
        <br />

    </div>
    <br />
    <br />
    <br />

    @include('maintainers.institutions.partials.delete')

@stop

@section('scripts')

    <script src="{{ mix('js/create-edit-common.js') }}"></script>
    <script src="{{ mix('js/edit-common.js') }}"></script>

@stop