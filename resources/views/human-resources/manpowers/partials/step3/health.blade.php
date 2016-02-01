
    <!-- disabilities -->
    <div class="box box-solid box-default">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-wheelchair"></i> Discapacidades</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div><!-- /.box-tools -->
        </div><!-- /.box-header -->
        <div class="box-body">

            {!! Form::open(['route' => 'human-resources.manpowers.store', 'method' => 'POST']) !!}

                <span id="disabilities">
                    <div class="col-md-12 text-center">
                        {!! Form::label('disability', 'Posee carnet de discapacidad ?') !!}<br>
                        {!! Form::label('si', 'Si') !!}
                        {!! Form::radio('disability', 'si', false) !!}
                        {!! Form::label('no', 'No') !!}
                        {!! Form::radio('disability', 'no', true) !!}
                    </div>
                </span>

            {!! Form::close() !!}


        </div>
    </div><!-- /.box -->
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
                <h2 class="text-center text-primary">No existen Enfermedades Asociadas <br />
                    <small>(Pulse "Agregar Enfermedad" para comenzar su adición)</small></h2>
                <hr />
            </span>
            <a href="" class="text-primary pull-right"><i class="fa fa-plus"></i> <strong>Agregar Enfermedad</strong></a>

        </div>
    </div><!-- /.box -->

    <ul class="pager wizard">
        <li class="previous"><a href="#" class="btn btn-default btn-lg btn-flat"><i class="fa fa-angle-left"></i> Paso 2</a></li>
        <li class="next"><a href="#" type="submit" class="btn bg-orange btn-flat btn-lg pull-right">Paso 4 <i class="fa fa-forward"></i></a></li>
    </ul>