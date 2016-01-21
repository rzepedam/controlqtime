@extends('layout.index')

@section('title_header') <br> @stop

@section('breadcumb')
    <li><a href="#"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li><a href="{{ route('maintainers.diseases.index') }}"><i class="fa fa-wheelchair"></i> Enfermedades</a></li>
    <li class="active">Ver</li>
@stop

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="box box-default">
                @include('maintainers.diseases.partials.detail')
            </div><!-- /.box -->
        </div>
    </div>

@stop