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

		var count_legal_representative = 1;

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


        /*****************************************************************
         ****************** Delete legal representative ******************
         *****************************************************************/

        function verificaUltimosNumeros(element)
        {
            var aux = element.charAt(element.length - 2);

            //Verificamos si penúltimo dígito es letra, si lo es solamente me quedo con último N°
            //Sino, retorno 2 últimos N°s
            if(isNaN(aux) == true){
                num_element = element.charAt(element.length - 1);
            }else{
                var temp    = element.charAt(element.length - 2);
                var temp2   = element.charAt(element.length - 1);
                num_element = temp + temp2;
            }

            return num_element;
        }


        $(document).on('click','.delete-elements-panel2',function() {

            var element = $(this).attr('id');
            var padre = $(this).parent().parent().parent().parent();
            $(this).parent().parent().parent().remove();
            var span = padre.children("span");

            for (var i = 1; i < span.length; i++) {

                item = verificaUltimosNumeros(span[i].id);

                $('span#legal_representative' + item).attr('id', 'legal_representative' + i);
                $('span#num_legal_representative' + item).text('Representante Legal#' + (i + 1));
                $('span#num_legal_representative' + item).attr('id', 'num_legal_representative' + i);

                $('label[for="full_name' + item + '"]').attr('for', 'full_name' + i);
                $('input#full_name' + item).attr('name', 'full_name' + i);
                $('input#full_name' + item).attr('id', 'full_name' + i);

                $('label[for="rut' + item + '"]').attr('for', 'rut' + i);
                $('input#rut' + item).attr('name', 'rut' + i);
                $('input#rut' + item).attr('id', 'rut' + i);

                $('label[for="country_id' + item + '"]').attr('for', "country_id" + i);
                $('select#country_id' + item).each(function(j) {
                    $(this).attr('id', 'country_id' + i);
                    $(this).attr('name', 'country_id' + i);
                });

                $('label[for="rating_id' + item + '"]').attr('for', "rating_id" + i);
                $('select#rating_id' + item).each(function(j) {
                    $(this).attr('id', 'rating_id' + i);
                    $(this).attr('name', 'rating_id' + i);
                });

                $('label[for="email' + item + '"]').attr('for', 'email' + i);
                $('input#email' + item).attr('name', 'email' + i);
                $('input#email' + item).attr('id', 'email' + i);

                $('label[for="phone1-' + item + '"]').attr('for', 'phone1-' + i);
                $('input#phone1-' + item).attr('name', 'phone1-' + i);
                $('input#phone1-' + item).attr('id', 'phone1-' + i);

                $('label[for="phone2-' + item + '"]').attr('for', 'phone2-' + i);
                $('input#phone2-' + item).attr('name', 'phone2-' + i);
                $('input#phone2-' + item).attr('id', 'phone2-' + i);

            }

            count_legal_representative--;

        });




		$.fn.addLegalRepresentative = function() {

			$add_representative_legal = '<span id="legal_representative"><div class="row"><div class="col-md-12"><span id="num_legal_representative" class="title-elements-panel2 text-green">Representante Legal #' + (count_legal_representative + 1) + '</span><a id="legal_representative" class="delete-elements-panel2 pull-right mitooltip" title="Eliminar Representante Legal"><i class="fa fa-trash"></i></a></div></div><br/><div class="row"><div class="col-md-7">{!! Form::label("full_name", "Nombre Completo") !!}{!! Form::text("full_name", null, ["class"=> "form-control"]) !!}</div><div class="col-md-2">{!! Form::label("rut", "Rut") !!}{!! Form::text("rut", null, ["class"=> "form-control"]) !!}</div><div class="col-md-3">{!! Form::label("country_id", "Nacionalidad") !!}{!! Form::select("country_id", $countries, null, ["class"=> "form-control"]) !!}</div></div><br/><div class="row"><div class="col-md-3">{!! Form::label("rating_id", "Cargo") !!}{!! Form::select("rating_id", $ratings, null, ["class"=> "form-control"]) !!}</div><div class="col-md-5">{!! Form::label("email", "Email") !!}<div class="input-group"> <div class="input-group-addon"> <i class="fa fa-envelope"></i> </div>{!! Form::email("email", null, ["class"=> "form-control"]) !!}</div></div><div class="col-md-2">{!! Form::label("phone1-", "Teléfono 1") !!}<div class="input-group"> <div class="input-group-addon"> <i class="fa fa-phone"></i> </div>{!! Form::text("phone1-", null, ["class"=> "form-control"]) !!}</div></div><div class="col-md-2">{!! Form::label("phone2-", "Teléfono 2") !!}<div class="input-group"> <div class="input-group-addon"> <i class="fa fa-fax"></i> </div>{!! Form::text("phone2-", null, ["class"=> "form-control"]) !!}</div></div></div><hr/></span>';

			$('#content_legal_representatives').append($add_representative_legal);

            //Refresh N° element disability
            $('span#legal_representative').attr('id', 'legal_representative' + count_legal_representative);
            $('span#num_legal_representative').attr('id', 'num_legal_representative' + count_legal_representative);

            $('label[for="full_name"]').attr('for', 'full_name' + count_legal_representative);
            $('input#full_name').attr('name', 'full_name' + count_legal_representative);
            $('input#full_name').attr('id', 'full_name' + count_legal_representative);

            $('label[for="rut"]').attr('for', 'rut' + count_legal_representative);
            $('input#rut').attr('name', 'rut' + count_legal_representative);
            $('input#rut').attr('id', 'rut' + count_legal_representative);

            $('label[for="country_id"]').attr('for', 'country_id' + count_legal_representative);
            $('select#country_id').each(function(i){
                $(this).attr('name', 'country_id' + count_legal_representative);
                $(this).attr('id', 'country_id' + count_legal_representative);
            });

            $('label[for="rating_id"]').attr('for', 'rating_id' + count_legal_representative);
            $('select#rating_id').each(function(i){
                $(this).attr('name', 'rating_id' + count_legal_representative);
                $(this).attr('id', 'rating_id' + count_legal_representative);
            });

            $('label[for="email"]').attr('for', 'email' + count_legal_representative);
            $('input#email').attr('name', 'email' + count_legal_representative);
            $('input#email').attr('id', 'email' + count_legal_representative);

            $('label[for="phone1-"]').attr('for', 'phone1-' + count_legal_representative);
            $('input#phone1-').attr('name', 'phone1-' + count_legal_representative);
            $('input#phone1-').attr('id', 'phone1-' + count_legal_representative);

            $('label[for="phone2-"]').attr('for', 'phone2-' + count_legal_representative);
            $('input#phone2-').attr('name', 'phone2-' + count_legal_representative);
            $('input#phone2-').attr('id', 'phone2-' + count_legal_representative);

            count_legal_representative++;
            $('.mitooltip').tooltip();
		};

	});

</script>

@stop