<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/human-resources/employees/pdf/index.css') }}">
    <title>Control de Asistencia</title>
</head>
<body>
    <div class="row form-group">
        <div class="col-xs-12 text-center form-group">
            <h4><b>CONTROL DE ASISTENCIA</b></h4>
        </div>
        <div class="col-xs-12 form-group">
            A continuación el detalle comprendido desde <b><span class="text-capitalize">{{ Date::parse($init)->format('l j F Y') }}</span></b> hasta <b><span class="text-capitalize">{{ Date::parse($end)->format('l j F Y') }}</span></b> aplicado los siguientes filtros. 
            <br />
            <br />
            <table class="table table-bordered table-condensed" style="font-size: 10px">
		        <tbody>
		        	<tr class="info">
		        		<td class="text-center"><b>Empresa</b></td>
		        		<td class="text-center"><b>Área</b></td>
	        			<td class="text-center"><b>Empleado</b></td>
		        	</tr>
		            <tr>
		                <td class="col-xs-5 text-center">
		                	<i class="fa fa-building-o" aria-hidden="true"></i> 
		                	{{ $assistances->first()->firm_name }}
	                	</td>
		                <td class="col-xs-2 text-center">
		                	@if ( ! is_null($area) )	
		                		<i class="fa fa-sitemap" aria-hidden="true"></i> 
		                		{{ $assistances->first()->name }}
	                		@else
	                			<b>-</b>
                			@endif
	                	</td>
		                <td class="col-xs-5 text-center">
		                	@if ( ! is_null($employee) )
		                		<i class="fa fa-street-view" aria-hidden="true"></i> 
		                		{{ $assistances->first()->full_name }}
	                		@else
                				<b>-</b>
            				@endif
	                	</td>
		            </tr>
		        </tbody>
	        </table>
        </div>
    </div>
    <table class="table table-bordered table-condensed">
        <thead>
            <tr class="success">
                <th class="col-xs-3">Nombre</th>
                <th class="col-xs-1 text-center">Rut</th>
                <th class="col-xs-1 text-center">Área</th>
                <th class="col-xs-2 text-center">Entrada</th>
                <th class="col-xs-2 text-center">Salida</th>
            </tr>
        </thead>
        <tbody>
            @foreach($assistances as $assistance)
                <tr>
                    <td style="vertical-align: middle;">
    					{{ $assistance->full_name }}
                	</td>
                    <td class="text-center" style="vertical-align: middle;">
						{{ $assistance->rut }}
                	</td>
                    <td class="text-center" style="vertical-align: middle;">
						{{ $assistance->name }}
                	</td>
                	<td class="text-center" style="vertical-align: middle;">
        				{{ Date::parse($assistance->log_in)->format('d-m-Y H:i:s') }}
                	</td>
                	<td class="text-center" style="vertical-align: middle;">
                		@if ( ! is_null($assistance->log_out))
                            {{ Date::parse($assistance->log_out)->format('d-m-Y H:i:s') }}
    					@else
							-
    					@endif
                	</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>