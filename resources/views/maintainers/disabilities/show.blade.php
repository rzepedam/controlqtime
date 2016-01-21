@extends('layout.index')

@section('title_header') <br> @stop

@section('breadcumb')
    <li><a href="#"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li><a href="{{ route('maintainers.disabilities.index') }}"><i class="fa fa-wheelchair"></i> Discapacidades</a></li>
    <li class="active">Ver</li>
@stop

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="box box-default">
                @include('maintainers.disabilities.partials.detail')
            </div><!-- /.box -->
        </div>
    </div>

@stop