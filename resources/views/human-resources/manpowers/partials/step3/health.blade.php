
    <!-- disabilities -->
    <div class="box box-solid box-default">
        <div class="box-header with-border">
            <h3 class="box-title">Discapacidades</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div><!-- /.box-tools -->
        </div><!-- /.box-header -->
        <div class="box-body">

            <span id="disabilities">
                <div class="col-md-3"></div>
                <div class="col-md-6 text-center">
                    {{ Form::label('disability', 'Posee carnet de discapacidad ?') }}<br>
                    {{ Form::label('si', 'Si') }}
                    {{ Form::radio('disability', 'si', false, ['id' => 'disability']) }}
                    {{ Form::label('no', 'No') }}
                    {{ Form::radio('disability', 'no', true) }}
                </div>
            </span>

        </div>
    </div><!-- /.box -->

    <!-- diseases -->
    <div class="box box-solid box-default">
        <div class="box-header with-border">
            <h3 class="box-title">Enfermedades</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div><!-- /.box-tools -->
        </div><!-- /.box-header -->
        <div class="box-body">

            <span class="disease">
                <div class="col-md-3"></div>
                <div class="col-md-6 text-center">
                    {{ Form::label('disease', 'Posee carnet de enfermedad ?') }}<br>
                    {{ Form::label('si', 'Si') }}
                    {{ Form::radio('disease', 'Si', false) }}
                    {{ Form::label('no', 'No') }}
                    {{ Form::radio('disease', 'No', true) }}
                </div>
            </span>

        </div>
    </div><!-- /.box -->

    <ul class="pager wizard">
        <li class="previous"><a href="#" class="btn btn-default btn-lg btn-flat"><i class="fa fa-angle-left"></i> Paso 2</a></li>
        <li class="next"><a href="#" type="submit" class="btn bg-orange btn-flat btn-lg pull-right">Paso 4 <i class="fa fa-forward"></i></a></li>
    </ul>


