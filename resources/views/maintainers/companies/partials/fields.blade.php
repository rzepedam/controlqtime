<div class="panel panel-bordered">
	<div class="panel-heading">
		<h3 class="panel-title"><i class="fa fa-building-o text-primary"></i> Datos Empresa <small>(Información Casa Matriz)</small></h3>
	</div>
	<div class="panel-body">

		@include('maintainers.companies.partials.create.data_company')

	</div>
</div>

<div class="panel panel-bordered">
	<div class="panel-heading">
		<div class="panel-actions">
			<span class="label label-outline label-success add_license waves-effect waves-block" onclick="$(this).addLegalRepresentative(this)"><i class="fa fa-plus"></i> Agregar Representante Legal</span>
		</div>
		<h3 class="panel-title"><i class="fa fa-gavel text-success"></i> Datos Representante Legal</h3>
	</div>

	<div class="panel-body">
		<div id="content_legal_representatives">

			<!-- load blank fields in create company case -->
			@if (end((explode('/', URL::current()))) == 'create')

				@include('maintainers.companies.partials.create.data_legal_representative')

			@elseif($company->num_representative)

				@include('maintainers.companies.partials.edit.edit_data_legal_representative')

			@else

				@include('maintainers.companies.partials.create.data_legal_representative')

			@endif

		</div>
	</div>

</div>

<div class="panel panel-bordered">
	<div class="panel-heading">
		<div class="panel-actions">
			<span class="label label-outline label-warning add_family_relationship waves-effect waves-block" onclick="$(this).addSubsidiary(this)"><i class="fa fa-plus"></i> Agregar Sucursal</span>
		</div>
		<h3 class="panel-title"><i class="fa fa-cubes text-warning"></i> Datos Sucursales</h3>
	</div>
	<div class="panel-body">
		<div id="content_subsidiaries">

			@if (end((explode('/', URL::current()))) == 'create')

				<h2 class="text-center text-warning">No existen Sucursales Asociadas <br />
					<small>(Pulse "Agregar Sucursal" para comenzar su adición)</small></h2>
				<br />
				<br />

			@elseif($company->num_subsidiary)

				@include('maintainers.companies.partials.forms.edit_subsidiaries')

			@else

				<h2 class="text-center text-warning">No existen Sucursales Asociadas <br />
					<small>(Pulse "Agregar Sucursal" para comenzar su adición)</small></h2>
				<br />
				<br />

			@endif

		</div>
	</div>

</div>
<br />
<div class="row">
	<div class="col-md-6">
		<a href="{{ route('maintainers.companies.index') }}">Volver</a>
		<!-- Gif Ajax hide -->
        <span class="ajax pull-right text-success"></span>
	</div>
	<div class="col-md-6 pull-right">
		<button id="btn-submit" type="submit" class="btn btn-squared btn-primary btn-lg waves-effect waves-light pull-right"><i class="fa fa-floppy-o"></i> Guardar</button>
	</div>
</div>