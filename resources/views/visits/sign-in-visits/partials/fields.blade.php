<div class="row">
    {{-- Apellido Paterno Text Field --}}
    <div class="col-md-3 form-group">
        {{ Form::label('male_surname', 'Apellido Paterno') }}
        {{ Form::text('male_surname', null, ['class' => 'form-control']) }}
    </div>
    {{-- Apellido Materno Text Field --}}
    <div class="col-md-3 form-group">
        {{ Form::label('female_surname', 'Apellido Materno') }}
        {{ Form::text('female_surname', null, ['class' => 'form-control']) }}
    </div>
    {{-- Primer Nombre Text Field --}}
    <div class="col-md-3 form-group">
        {{ Form::label('first_name', 'Primer Nombre') }}
        {{ Form::text('first_name', null, ['class' => 'form-control']) }}
    </div>
    {{-- Segundo Nombre Text Field --}}
    <div class="col-md-3 form-group">
        {{ Form::label('second_name', 'Segundo Nombre') }}
        {{ Form::text('second_name', null, ['class' => 'form-control']) }}
    </div>
</div>
<div class="row">
    {{-- Rut Text Field --}}
    <div class="col-md-3 form-group">
        {{ Form::label('rut', 'Rut') }} <i class="fa fa-info-circle tooltip-primary text-primary" data-placement="right" data-toggle="tooltip" data-original-title="Ingrese rut sin puntos ni guión. <p class='text-center'>Ej: 19317518k</p>" data-html="true"></i>
        {{ Form::text('rut', null, ['class' => 'form-control check_rut']) }}
    </div>
    {{-- Fecha Nacimiento Text Field --}}
    <div class="col-md-3 form-group">
        {{ Form::label('birthday', 'Fecha Nacimiento', ['class' => 'control-label']) }}
        <div class="input-group date" data-plugin="datepicker" data-end-date="{{ date('d-m-Y') }}">
            <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
            </div>
            {{ Form::text('birthday', Route::is('sign-in-visits.edit') ? $signInVisit->birthday : null, ['class' => 'form-control text-center', "readonly"]) }}
        </div>
    </div>
    <div class="col-md-3 form-group margin-0">
        {{ Form::label('male', 'Sexo') }}
        <ul class="list-unstyled list-inline text-center">
            <li>
                <div class="radio-custom radio-primary">
                    @if (Route::is('sign-in-visits.create'))
                        <input type="radio" id="male" name="is_male" value="M" />
                    @else
                        <input type="radio" id="male" name="is_male" value="M" {{ $signInVisit->is_male ? 'checked' : null }} />
                    @endif
                    <label for="male">M</label>
                </div>
            </li>
            <li></li>
            <li>
                <div class="radio-custom radio-primary">
                    @if (Route::is('sign-in-visits.create'))
                        <input type="radio" id="female" name="is_male" value="F" />
                    @else
                        <input type="radio" id="female" name="is_male" value="F" {{ ! $signInVisit->is_male ? 'checked' : null }} />
                    @endif
                    <label for="female">F</label>
                </div>
            </li>
        </ul>
    </div>
    {{-- Celular Text Field --}}
    <div class="col-md-3 form-group">
        {{ Form::label('phone', 'Celular') }}
        {{ Form::text('phone', null, ['class' => 'form-control']) }}
    </div>
</div>
<div class="row">
    {{-- Email Text Field --}}
    <div class="col-md-6 form-group">
        {{ Form::label('email', 'Email') }}
        {{ Form::text('email', null, ['id' => 'SignInVisit', 'class' => 'form-control', 'onBlur' => '$(this).checkEmail(this)']) }}
    </div>
</div>
<div id="SignInVisit" class="row hide">
    <br />
    <div class="col-md-12 text-center">
        @include('layout.ajax.show_spin_icon')
    </div>
</div>