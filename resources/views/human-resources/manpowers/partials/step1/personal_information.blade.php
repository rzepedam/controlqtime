
    <div class="box box-solid box-default">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-street-view"></i> Datos Personales</h3>
        </div><!-- /.box-header -->
        <div class="box-body">

            @include('human-resources.manpowers.partials.step1.partials.data')

        </div><!-- /.box-body -->
    </div><!-- /.box -->

    <div class="box box-solid box-default">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-asterisk"></i> Datos de Autenticación</h3>
        </div><!-- /.box-header -->
        <div class="box-body">


        </div>
    </div><!-- /.box -->


    <div class="box box-solid box-default">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-child"></i> Parentescos Familiares</h3>
        </div><!-- /.box-header -->
        <div class="box-body">

            <div id="content_family_relationships">
                @if (Session::get('count_family_relationship') > 0)
                    @for($i = 0; $i < Session::get('count_family_relationship'); $i++)

                        @include('human-resources.manpowers.partials.step1.partials.family_relationship')

                    @endfor
                @else
                    <h2 class="text-center text-light-blue">No existen Parentescos Familiares Asociados <br />
                        <small class="text-muted">(Pulse "Agregar Parentesco Familiar" para comenzar su adición)</small></h2>
                    <br />
                    <hr />
                @endif
            </div>
            <div class="row">
                <div class="col-md-12 pull-right">
                    <a id="add_family_relationship" href="javascript: void(0)" onclick="$(this).addElementFamilyRelationship(this)" class="text-light-blue add_family_relationship pull-right"><i class="fa fa-plus"></i> Agregar Parentesco Familiar</a>
                </div>
            </div>
            <p></p>

        </div>
    </div><!-- /.box -->
    <br />