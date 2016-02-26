<div class="panel box box-primary">
	<div class="box-header with-border">
		<h4 class="box-title">
		  <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" class="collapsed black">Datos Empresa</a>
		</h4>
	</div>
	<div id="collapseOne" class="panel-collapse collapse in" aria-expanded="true">
		<div class="box-body">

			@include('maintainers.companies.partials.forms.data_company')

		</div>
	</div>
</div>

<div class="panel box box-success">
	<div class="box-header with-border">
		<h4 class="box-title">
		  <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" class="collapsed black">Datos Representante Legal</a>
		</h4>
	</div>
	<div id="collapseTwo" class="panel-collapse collapse" aria-expanded="false">
		<div class="box-body">

			<div id="content_legal_representatives">

				@include('maintainers.companies.partials.forms.data_legal_representative')

			</div>
			<div class="row">
				<div class="col-md-12 pull-right">
				    <a id="add_legal_representative" href="javascript: void(0)" onclick="$(this).addLegalRepresentative(this)" class="text-green add_legal_representative pull-right"><i class="fa fa-plus"></i> Agregar Representante Legal</a>
				</div>
			</div>

		</div>
	</div>
</div>

<div class="panel box box-danger">
    <div class="box-header with-border">
        <h4 class="box-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" class="collapsed black">Datos Administrador de Contrato</a>
        </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse" aria-expanded="false">
        <div class="box-body">

            <div id="content_admin_representatives">
                <h2 class="text-center text-red">No existen Administradores de Contrato Asociados <br />
                    <small class="text-muted">(Pulse "Agregar Administrador de Contrato" para comenzar su adición)</small></h2>
                <br />
                <hr />
            </div>
            <div class="row">
                <div class="col-md-12 pull-right">
                    <a id="add_admin_representative" href="javascript: void(0)" onclick="$(this).addAdminRepresentative(this)" class="text-red add_admin_representative pull-right"><i class="fa fa-plus"></i> Agregar Administrador de Contrato</a>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="panel box box-warning">
	<div class="box-header with-border">
		<h4 class="box-title">
		  <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" class="collapsed black">Datos Casa Matriz</a>
		</h4>
	</div>
	<div id="collapseFour" class="panel-collapse collapse" aria-expanded="false">
		<div class="box-body">

			@include('maintainers.companies.partials.forms.data_head_quarter')

		</div>
	</div>
</div>
<br />
<br />
<a href="{{ route('maintainers.companies.index') }}">Volver</a>
<button type="submit" class="btn btn-primary btn-flat btn-lg pull-right"><i class="fa fa-floppy-o"></i> Guardar</button>
