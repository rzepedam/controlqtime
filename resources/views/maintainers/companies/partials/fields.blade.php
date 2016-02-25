<div class="panel box box-primary">
	<div class="box-header with-border">
		<h4 class="box-title">
		  <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" class="collapsed">Datos Empresa</a>
		</h4>
	</div>
	<div id="collapseOne" class="panel-collapse collapse in" aria-expanded="true">
		<div class="box-body">
			<div class="row">
				<div class="col-md-2">
					{!! Form::label('rut_business', 'Rut') !!}
					{!! Form::text('rut_business', null, ['class' => 'form-control', 'autofocus']) !!}
				</div>
				<div class="col-md-5">
					{!! Form::label('business_name', 'Razón Social') !!}
					{!! Form::text('business_name', null, ['class' => 'form-control']) !!}
				</div>
				<div class="col-md-4">
					{!! Form::label('gyre', 'Giro') !!}
					{!! Form::text('gyre', null, ['class' => 'form-control']) !!}
				</div>
				<div class="col-md-1">
					{!! Form::label('num_worker', 'N° Trab.') !!}
					{!! Form::text('num_worker', null, ['class' => 'form-control text-center']) !!}
				</div>
			</div>
		</div>
	</div>
</div>

<div class="panel box box-success">
	<div class="box-header with-border">
		<h4 class="box-title">
		  <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" class="collapsed">Datos Representante Legal</a>
		</h4>
	</div>
	<div id="collapseTwo" class="panel-collapse collapse in" aria-expanded="false">
		<div class="box-body">
			<div class="row">
				<div class="col-md-7">
					{!! Form::label('full_name', 'Nombre Completo') !!}
					{!! Form::text('full_name', null, ['class' => 'form-control']) !!}
				</div>
				<div class="col-md-2">
					{!! Form::label('rut', 'Rut') !!}
					{!! Form::text('rut', null, ['class' => 'form-control']) !!}
				</div>
				<div class="col-md-3">
					{!! Form::label('country_id', 'Nacionalidad')  !!}
					{!! Form::select('country_id', $countries, null, ['class' => 'form-control']) !!}
				</div>
			</div>
			<br />
			<div class="row">
				<div class="col-md-3">
					{!! Form::label('rating_id', 'Cargo') !!}
					{!! Form::select('rating_id', $ratings, null, ['class' => 'form-control']) !!}
				</div>
				<div class="col-md-5">
					{!! Form::label('email', 'Email') !!}
					<div class="input-group">
			            <div class="input-group-addon">
			                <i class="fa fa-envelope"></i>
			            </div>
			            {{ Form::email('email', null, ['class' => 'form-control']) }}
			        </div>
				</div>
				<div class="col-md-2">
					{!! Form::label('phone1', 'Teléfono 1') !!}
					<div class="input-group">
			            <div class="input-group-addon">
			                <i class="fa fa-phone"></i>
			            </div>
			            {{ Form::text('phone1', null, ['class' => 'form-control']) }}
			        </div>
				</div>
				<div class="col-md-2">
					{!! Form::label('phone2', 'Teléfono 2') !!}
					<div class="input-group">
			            <div class="input-group-addon">
			                <i class="fa fa-fax"></i>
			            </div>
			            {{ Form::text('phone2', null, ['class' => 'form-control']) }}
			        </div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="panel box box-warning">
	<div class="box-header with-border">
		<h4 class="box-title">
		  <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" class="collapsed">Datos Casa Matriz</a>
		</h4>
	</div>
	<div id="collapseThree" class="panel-collapse collapse in" aria-expanded="false">
		<div class="box-body">
			<div class="row">
				<div class="col-md-5">
					{!! Form::label('address', 'Dirección') !!}
					{!! Form::text('address', null, ['class' => 'form-control']) !!}
				</div>
				<div class="col-md-3">
					{!! Form::label('region_id', 'Región') !!}
					{!! Form::select('region_id', $regions, null, ['class' => 'form-control']) !!}
				</div>
				<div class="col-md-2">
					{!! Form::label('province_id', 'Provincia') !!}
					{!! Form::select('province_id', $provinces, null, ['class' => 'form-control']) !!}
				</div>
				<div class="col-md-2">
					{!! Form::label('commune_id', 'Comuna') !!}
					{!! Form::select('commune_id', $communes, null, ['class' => 'form-control']) !!}
				</div>
			</div>
		</div>
	</div>
</div>
<br />
<br />
<a href="{{ route('maintainers.companies.index') }}">Volver</a>
<button type="submit" class="btn btn-primary btn-flat btn-lg pull-right"><i class="fa fa-floppy-o"></i> Guardar</button>
