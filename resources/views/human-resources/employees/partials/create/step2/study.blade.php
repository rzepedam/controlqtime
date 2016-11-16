<span id="study{{ $i }}">
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-alt alert-info alert-dismissible" role="alert">
                <span id="num_study{{ $i }}" class="text-info">
                    Estudio Académico #{{ $i + 1 }}
                </span>
                <a id="study" class="delete-elements pull-right tooltip-danger" data-toggle="tooltip" data-original-title="Eliminar Estudio Académico" data-html="true"><i class="fa fa-trash"></i></a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-1 hide">
            {{ Form::label("id_study", "ID", ["class" => "control-label"]) }}
            {{ Form::text("id_study[]", Session::get('id_study')[$i], ["id" => "id_study", "class" => "form-control"]) }}
        </div>
        <div class="col-sm-6 col-md-3 form-group">
            {{ Form::label('degree_id', 'Nivel de Estudio', ['class' => 'control-label']) }}
            {{ Form::select('degree_id[]', $degrees, Session::get('degree_id')[$i], ['class'=> 'form-control']) }}
        </div>

        @if (Session::get('degree_id')[$i] == 1 || Session::get('degree_id')[$i] == 2)
            <div class="col-sm-6 col-md-4 form-group hide">
                {{ Form::label('name_study', 'Profesión u Oficio', ['class' => 'control-label']) }}
                {{ Form::text('name_study[]', Session::get('name_study')[$i], ['class'=> 'form-control', 'data-plugin' => 'maxlength', 'maxlength' => '80']) }}
            </div>
            <div class="col-sm-6 col-md-4 form-group">
                {{ Form::label("name_institution", "Institución", ["class"=> "control-label"]) }}
                {{ Form::text("name_institution[]", Session::get('name_institution')[$i], ["class"=> "form-control maxlength", "data-plugin"=> "maxlength", "maxlength"=> "80"]) }}
            </div>
            <div class="col-sm-6 col-md-3 form-group hide">
                {{ Form::label('institution_study_id', 'Institución', ['class' => 'control-label']) }}
                {{ Form::select('institution_study_id[]', $institutions, Session::get('institution_study_id')[$i], ['class'=> 'form-control']) }}
            </div>
        @endif

        @if (Session::get('degree_id')[$i] == 3)
            <div class="col-sm-6 col-md-4 form-group">
                {{ Form::label('name_study', 'Profesión u Oficio') }}
                {{ Form::text('name_study[]', Session::get('name_study')[$i], ['class'=> 'form-control', 'data-plugin' => 'maxlength', 'maxlength' => '80']) }}
            </div>
            <div class="col-sm-6 col-md-4 form-group">
                {{ Form::label("name_institution", "Institución", ["class"=> "control-label"]) }}
                {{ Form::text("name_institution[]", Session::get('name_institution')[$i], ["class"=> "form-control maxlength", "data-plugin"=> "maxlength", "maxlength"=> "80"]) }}
            </div>
            <div class="col-sm-6 col-md-3 form-group hide">
                {{ Form::label('institution_study_id', 'Institución', ['class'=> 'control-label']) }}
                {{ Form::select('institution_study_id[]', $institutions, Session::get('institution_study_id')[$i], ['class'=> 'form-control']) }}
            </div>
        @endif

        @if (Session::get('degree_id')[$i] == 4 || Session::get('degree_id')[$i] == 5 || Session::get('degree_id')[$i] == 6 || Session::get('degree_id')[$i] == 7 || Session::get('degree_id')[$i] == 8)
            <div class="col-sm-6 col-md-4 form-group">
                {{ Form::label('name_study', 'Profesión u Oficio') }}
                {{ Form::text('name_study[]', Session::get('name_study')[$i], ['class'=> 'form-control', 'data-plugin' => 'maxlength', 'maxlength' => '80']) }}
            </div>
            <div class="col-sm-6 col-md-4 form-group hide">
                {{ Form::label("name_institution", "Institución", ["class"=> "control-label"]) }}
                {{ Form::text("name_institution[]", Session::get('name_institution')[$i], ["class"=> "form-control maxlength", "data-plugin"=> "maxlength", "maxlength"=> "80"]) }}
            </div>
            <div class="col-sm-6 col-md-3 form-group">
                {{ Form::label('institution_study_id', 'Institución') }}
                {{ Form::select('institution_study_id[]', $institutions, Session::get('institution_study_id')[$i], ['class'=> 'form-control']) }}
            </div>
        @endif

        <div class="col-sm-6 col-md-2 form-group">
            {{ Form::label('date_obtention', 'Fecha Obtención', ['class' => 'control-label']) }}
            <div class="input-group date beforeCurrentDate">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
                {{ Form::text('date_obtention[]', Session::get('date_obtention')[$i], ['class'=> 'form-control text-center', 'readonly']) }}
            </div>
        </div>
    </div>
    <br />
</span>