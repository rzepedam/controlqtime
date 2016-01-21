@extends('layout.index')

@section('title_header')  <br> @stop

@section('breadcumb')
    <li><a href="{{ url('human-resources') }}"><i class="fa fa-users"></i> RR.HH</a></li>
@stop

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-4 text-center">
                    <a href="{{ route('human-resources.manpowers.index') }}" class="btn btn-lg btn-primary btn-flat">
                        <i class="fa fa-users fa-2x"></i>
                        <p>Trabajadores</p>
                    </a>
                </div>

            </div>
        </div>
    </div>
@stop