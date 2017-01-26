<div class="row">
    <div class="col-sm-4 col-md-3 form-group">
        {{ Form::label("contact_relationship_id", "Relación", ["class"=> "control-label"]) }}
        {{ Form::select("contact_relationship_id", $relationships, null, ["class"=> "form-control"]) }}
    </div>
    <div class="col-sm-4 col-md-6 form-group">
        {{ Form::label('name_contact', 'Nombre', ['class'=> 'control-label']) }}
        {{ Form::text('name_contact', Route::is('sign-in-visits.edit') ? $signInVisit->contactsable->name_contact : null, ['class'=> 'form-control', 'data-plugin' => 'maxlength', 'maxlength' => '120']) }}
    </div>
    <div class="col-sm-4 col-md-3 form-group">
        {{ Form::label('tel_contact', 'Celular', ['class'=> 'control-label']) }}
        <div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-phone"></i>
            </div>
            {{ Form::text('tel_contact', Route::is('sign-in-visits.edit') ? $signInVisit->contactsable->tel_contact : null, ['class'=> 'form-control', 'data-plugin' => 'maxlength', 'maxlength' => '12']) }}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-6 col-md-6 form-group">
        {{ Form::label('email_contact', 'Email', ['class'=> 'control-label']) }}
        <div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-envelope"></i>
            </div>
            {{ Form::text('email_contact', Route::is('sign-in-visits.edit') ? $signInVisit->contactsable->email_contact : null, ['id' => 'ContactEmployee,SignInVisit', 'class'=> 'form-control', Route::is('sign-in-visits.edit') ? '' : 'onBlur' => '$(this).checkEmail(this)', 'data-plugin' => 'maxlength', 'maxlength' => '60']) }}
        </div>
    </div>
    <div class="col-sm-6 col-md-6 form-group">
        {{ Form::label('address_contact', 'Dirección', ['class'=> 'control-label']) }}
        {{ Form::text('address_contact', Route::is('sign-in-visits.edit') ? $signInVisit->contactsable->address_contact : null, ['class'=> 'form-control', 'data-plugin' => 'maxlength', 'maxlength' => '150']) }}
    </div>
</div>
<div id="ContactEmployee" class="row hide">
    <br />
    <div class="col-md-12 text-center">
        @include('layout.ajax.show_spin_icon')
    </div>
</div>