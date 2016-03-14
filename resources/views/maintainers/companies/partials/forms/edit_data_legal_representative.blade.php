<?php $i = 0; ?>
@foreach($company->legalRepresentatives as $legal_representative)
    <span id="legal_representative{{ $i }}">
        <div class="row">
            <div class="col-md-12">
                <span id="num_legal_representative{{ $i }}" class="title-elements-panel2 text-green">Representante Legal #{{ $i + 1 }}</span>
                @if($i > 0)
                    <a id="legal_representative" class="delete-elements-panel2 pull-right mitooltip" title="Eliminar Representante Legal"><i class="fa fa-trash"></i></a>
                @endif

            </div>
        </div>
        <br />
        <div class="row">
            <div class="col-md-1 hide">
                <div class="form-group">
                    {{ Form::label('id' . $i, 'ID') }}
                    {{ Form::text('id' . $i, $legal_representative->id, ['class' => 'form-control']) }}
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    {{ Form::label('male_surname' . $i, 'Apellido Paterno') }}
                    {{ Form::text('male_surname' . $i, $legal_representative->male_surname, ['class' => 'form-control']) }}
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    {{ Form::label('female_surname' . $i, 'Apellido Materno') }}
                    {{ Form::text('female_surname' . $i, $legal_representative->female_surname, ['class' => 'form-control']) }}
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    {{ Form::label('first_name' . $i, 'Primer Nombre') }}
                    {{ Form::text('first_name' . $i, $legal_representative->first_name, ['class' => 'form-control']) }}
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    {{ Form::label('second_name' . $i, 'Segundo Nombre') }}
                    {{ Form::text('second_name' . $i, $legal_representative->second_name, ['class' => 'form-control']) }}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    {{ Form::label('rut' . $i, 'Rut') }} <i class="fa fa-info-circle mitooltip text-primary" title="Ingrese rut sin puntos ni guión. <p class='text-center'>Ej: 19317518k</p>" data-html="true"></i>
                    {{ Form::text('rut' . $i, $legal_representative->rut, ['class' => 'form-control check_rut']) }}
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    {!! Form::label("birthday" . $i, "Fecha de Nac.")  !!}
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        {!! Form::text("birthday" . $i, $legal_representative->birthday, ["class" => "form-control data_mask"])  !!}
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    {{ Form::label('nationality_id' . $i, 'Nacionalidad')  }}
                    {{ Form::select('nationality_id' . $i, $nationalities, $legal_representative->nationality_id, ['class' => 'form-control']) }}
                </div>
            </div>
            <div class="col-md-5">
                <div class="form-group">
                    {{ Form::label('email' . $i, 'Email') }}
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-envelope"></i>
                        </div>
                        {{ Form::text('email' . $i, $legal_representative->email, ['class' => 'form-control', 'onBlur' => '$(this).checkEmail(this)']) }}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    {{ Form::label('phone1-' . $i, 'Teléfono 1') }}
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-phone"></i>
                        </div>
                        {{ Form::text('phone1-' . $i, $legal_representative->phone1, ['class' => 'form-control']) }}
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    {{ Form::label('phone2-' . $i, 'Teléfono 2') }}
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-fax"></i>
                        </div>
                        {{ Form::text('phone2-' . $i, $legal_representative->phone2, ['class' => 'form-control']) }}
                    </div>
                </div>
            </div>
        </div>
        <hr />
    </span>
    <?php $i++; ?>
@endforeach