@extends('layout.index')

@section('title_header') Detalle Empresa : <span class="text-primary">{{ $company->id }}</span> @stop

@section('breadcumb')
    <li><a href="javascript:void(0)"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li><a href="{{ route('maintainers.companies.index') }}"><i class="fa fa-building-o"></i> Empresas</a></li>
    <li class="active">Ver</li>
@stop

@section('content')

<div class="nav-tabs-horizontal">
    <ul class="nav nav-tabs" data-plugin="nav-tabs" role="tablist">
        <li class="active" role="presentation"><a data-toggle="tab" href="#tab_1" aria-controls="tab_1" role="tab"><i class="fa fa-building"></i> Datos Empresa</a></li>
        <li role="presentation"><a data-toggle="tab" href="#tab_2" aria-controls="tab_2" role="tab"><i class="fa fa-gavel"></i> Representante Legal</a></li>
    </ul>
    <div class="tab-content padding-top-20">
        <div class="tab-pane active" id="tab_1" role="tabpanel">

            @include('maintainers.companies.partials.show.company')

        </div>
        <div class="tab-pane" id="tab_2" role="tabpanel">

            @include('maintainers.companies.partials.show.legal_representative')

        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <a href="{{ route('maintainers.companies.index') }}">Volver</a>
    </div>
</div>

@stop