{{ Form::open(['route' => 'human-resources.manpowers.store', 'method' => 'POST', 'files' => true, 'id' => 'step2']) }}

    <!-- disabilities -->
    <div class="box box-solid box-default">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-wheelchair"></i> Discapacidades</h3>
        </div><!-- /.box-header -->
        <div class="box-body">

            <div id="content_disabilities">
                <h2 class="text-center text-info">No existen Discapacidades Asociadas <br />
                    <small class="text-muted">(Pulse "Agregar Discapacidad" para comenzar su adición)</small></h2>
                <br />
                <hr />
            </div>
            <div class="row">
                <div class="col-md-12 pull-right">
                    <a id="add_disability" href="javascript: void(0)" onclick="$(this).addElementDisability(this)" class="text-primary pull-right"><i class="fa fa-plus"></i> Agregar Discapacidad</a>
                </div>
            </div>
            <button type="submit" id="submitForm"> enviar</button>
        </div>
    </div>

{{ Form::close() }}
    <br>
    
    <!-- diseases -->
    <div class="box box-solid box-default">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-bed"></i> Enfermedades</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div><!-- /.box-tools -->
        </div><!-- /.box-header -->
        <div class="box-body">

            <span class="diseases">

            </span>

        </div>
    </div><!-- /.box -->
