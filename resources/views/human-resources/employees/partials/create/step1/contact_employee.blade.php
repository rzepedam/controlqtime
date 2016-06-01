<span id="contact{{ $i }}">
	<div class="row">
        <div class="col-md-12">
            <div class="alert alert-alt alert-success alert-dismissible" role="alert">
			    <span id="num_contact{{ $i }}" class="text-success">
				    Contacto #{{ $i + 1 }}
			    </span>
                <a id="contact" class="delete-elements pull-right tooltip-danger" data-toggle="tooltip" data-original-title="Eliminar Contacto" data-html="true"><i class="fa fa-trash"></i></a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-1 hide">
            <div class="form-group">
                {{ Form::label("id_contact", "ID", ["class" => "control-label"]) }}
                {{ Form::text("id_contact[]", Session::get('id_contact')[$i], ["id" => "id_contact", "class" => "form-control"]) }}
            </div>
        </div>
        <div class="col-md-3 form-group">
            {{ Form::label("contact_relationship_id", "Relación", ["class"=> "control-label"]) }}
            {{ Form::select("contact_relationship_id[]", $relationships, Session::get('contact_relationship_id')[$i], ["class"=> "form-control"]) }}
        </div>
        <div class="col-md-5 form-group">
            {{ Form::label('name_contact', 'Nombre', ['class' => 'control-label']) }}
            {{ Form::text('name_contact[]', Session::get('name_contact')[$i], ['class' => 'form-control']) }}
        </div>
        <div class="col-md-4 form-group">
            {{ Form::label('email_contact', 'Email', ['class' => 'control-label']) }}
            {{ Form::text('email_contact[]', Session::get('email_contact')[$i], ['id' => 'EmailContactEmployee', 'class' => 'form-control', 'onBlur' => '$(this).checkEmail(this)']) }}
        </div>
    </div>
    <div class="row">
        <div class="col-md-9 form-group">
            {{ Form::label('address_contact', 'Dirección', ['class' => 'control-label']) }}
            {{ Form::text('address_contact[]', Session::get('address_contact')[$i], ['class' => 'form-control']) }}
        </div>
        <div class="col-md-3 form-group">
            {{ Form::label('tel_contact', 'Teléfono', ['class' => 'control-label']) }}
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-phone"></i>
                </div>
                {{ Form::text('tel_contact[]', Session::get('tel_contact')[$i], ['class' => 'form-control']) }}
            </div>
        </div>
    </div>
    <br />
</span>
