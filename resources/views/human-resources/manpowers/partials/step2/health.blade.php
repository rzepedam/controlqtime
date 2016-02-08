
    <!-- disabilities -->
    <div class="box box-solid box-default">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-wheelchair"></i> Discapacidades</h3>
        </div><!-- /.box-header -->
        <div class="box-body">

                <div id="disabilities">
                    <div class="col-md-12 text-center">
                        {!! Form::label('disability', 'Posee carnet de discapacidad ?') !!}<br>
                        {!! Form::label('si', 'Si') !!}
                        {!! Form::radio('disability', 'si', false) !!}
                        {!! Form::label('no', 'No') !!}
                        {!! Form::radio('disability', 'no', true) !!}
                    </div>
                </div>
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

            </span>

        </div>
    </div><!-- /.box -->
