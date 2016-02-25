@extends('layout.index')

@section('title_header') Crear Nueva Empresa @stop

@section('breadcumb')
    <li><a href="#"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li><a href="{{ route('maintainers.companies.index') }}"><i class="fa fa-building-o"></i> Empresas</a></li>
    <li class="active">Nuevo</li>
@stop

@section('content')

    {!! Form::open(array('route' => 'maintainers.companies.store', 'method' => 'POST')) !!}
        @include('maintainers.companies.partials.fields')
    {!! Form::close() !!}

@stop

@section('scripts')

<script type="text/javascript">

	$(document).ready(function(){

		$('#region_id').change(function(){
			$.get('{{ url("loadProvinces")}}',
			 	{ id: $('#region_id').val() },
			 	function(data) {
					$('#province_id').empty();
					$('#province_id').append("<option value='provincia'>Seleccione Provincia...</option>");
					$('#commune_id').empty();
					$('#commune_id').append("<option value='comuna'>Seleccione Comuna...</option>");
					$.each(data, function(key, element) {
						$('#province_id').append("<option value='" + key + "'>" + element + "</option>");
					});
				}
			);
		});

		$('#province_id').change(function(){
			$.get(
				'{{ url("loadCommunes")}}',
				{ id: $('#province_id').val() },
				function(data) {
					$('#commune_id').empty();
					$.each(data, function(key, element) {
						$('#commune_id').append("<option value='" + key + "'>" + element + "</option>");
					});
				}
			);
		});

	});

</script>

@stop