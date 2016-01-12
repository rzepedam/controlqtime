@extends('layout.index')

@section('title_header') Listado de Países
    <br>
    <a href="{{ route('maintainers.countries.create') }}" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Crear Nuevo País</a>
@stop

@section('breadcumb')
    <li><a href="#"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li class="active">Países</li>
@stop

@section('content')

    @include('layout.messages.errors')
    @include('layout.messages.success')

    @if($countries->count())
        @include('maintainers.countries.partials.table')
        {!! Form::open(['route' => ['maintainers.countries.destroy', ':USER_ID'], 'method' => 'DELETE', 'id' => 'form-delete']) !!}
        {!! Form::close() !!}
    @else
        <h3 class="text-center">No se han encontrado Países</h3>
    @endif

    {{ $countries->links() }}

@stop

@section('scripts')
    <script>
        $(document).ready(function(){
            $('.btn-delete').click(function() {
                var row = $(this).parents('tr');
                var id = row.data('id');
                var form = $('#form-delete');
                var url = form.attr('action').replace(':USER_ID', id);
                var data = form.serialize();

                row.fadeOut();

                $.post(url,data, function(result) {

                }).fail(function() {
                    row.show();
                });

            });
        })
    </script>
@stop