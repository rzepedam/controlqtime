

    <!-- disabilities -->
    <div class="box box-solid box-default">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-wheelchair"></i> Discapacidades</h3>
        </div><!-- /.box-header -->
        <div class="box-body">

            <div id="content_disabilities">
                @if (Session::get('count_disabilities') > 0)
                    @for($i = 0; $i < Session::get('count_disabilities'); $i++)

                        @include('human-resources.manpowers.partials.step2.partials.disability')

                    @endfor
                @else
                    <h2 class="text-center text-light-blue">No existen Discapacidades Asociadas <br />
                        <small class="text-muted">(Pulse "Agregar Discapacidad" para comenzar su adición)</small></h2>
                    <br />
                    <hr />
                @endif
            </div>
            <div class="row">
                <div class="col-md-12 pull-right">
                    <a href="javascript: void(0)" class="addElementDisability text-light-blue pull-right"><i class="fa fa-plus"></i> Agregar Discapacidad</a>
                </div>
            </div>
            <p></p>

        </div>
    </div>
    <br />

    <!-- diseases -->
    <div class="box box-solid box-default">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-bed"></i> Enfermedades</h3>
        </div><!-- /.box-header -->
        <div class="box-body">

            <div id="content_diseases">
                @if (Session::get('count_diseases') > 0)
                    @for($i = 0; $i < Session::get('count_diseases'); $i++)

                        @include('human-resources.manpowers.partials.step2.partials.disease')

                    @endfor
                @else
                    <h2 class="text-center text-green">No existen Enfermedades Asociadas <br />
                        <small class="text-muted">(Pulse "Agregar Enfermedad" para comenzar su adición)</small></h2>
                    <br />
                    <hr />
                @endif
            </div>
            <div class="row">
                <div class="col-md-12 pull-right">
                    <a id="add_disease" href="javascript: void(0)" onclick="$(this).addElementDisease(this)" class="text-green pull-right"><i class="fa fa-plus"></i> Agregar Enfermedad</a>
                </div>
            </div>
            <p></p>

        </div>
    </div><!-- /.box -->
    <br />

    <!-- family_responsabilities -->
    <div class="box box-solid box-default">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-child"></i><i class="fa fa-child"></i> Cargas Familiares</h3>
        </div><!-- /.box-header -->
        <div class="box-body">

            <div id="content_family_responsabilities">
                @if (Session::get('count_family_responsabilities') > 0)
                    @for($i = 0; $i < Session::get('count_family_responsabilities'); $i++)

                        @include('human-resources.manpowers.partials.step2.partials.family_responsability')
                    @endfor
                @else
                    <h2 class="text-center text-yellow">No existen Cargas Familiares Asociadas <br />
                        <small class="text-muted">(Pulse "Agregar Carga Familiar" para comenzar su adición)</small></h2>
                    <br />
                    <hr />
                @endif
            </div>
            <div class="row">
                <div class="col-md-12 pull-right">
                    <a id="add_family_responsability" href="javascript: void(0)" onclick="$(this).addElementFamilyResponsability(this)" class="text-yellow pull-right"><i class="fa fa-plus"></i> Agregar Carga Familiar</a>
                </div>
            </div>
            <p></p>

        </div>
    </div><!-- /.box -->
    <br />

    <div class="box box-solid box-default">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-stethoscope"></i> Exámenes Preocupacionales</h3>
        </div><!-- /.box-header -->
        <div class="box-body">

            <div id="content_exams">
                <h2 class="text-center text-muted">No existen Exámenes Preocupacionales Asociados <br />
                    <small class="text-muted">(Pulse "Agregar Examen Preocupacional" para comenzar su adición)</small></h2>
                <br />
                <hr />
            </div>
            <div class="row">
                <div class="col-md-12 pull-right">
                    <a id="add_exam" href="javascript: void(0)" onclick="$(this).addElementExam(this)" class="text-muted pull-right"><i class="fa fa-plus"></i> Agregar Examen Preocupacional</a>
                </div>
            </div>
            <p></p>

        </div>
    </div><!-- /.box -->