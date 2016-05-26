<?php $i = 0; ?>
@foreach($employee->infoContacts as $info_contact)

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
                    {{ Form::text("id_contact[]", $info_contact->id, ["id" => "id_contact" . $i, "class" => "form-control"]) }}
                </div>
            </div>
            <div class="col-md-6 form-group">
                {{ Form::label('name_contact', 'Nombre', ['class' => 'control-label']) }}
                {{ Form::text('name_contact[]', $info_contact->name_contact, ['class' => 'form-control']) }}
            </div>
            <div class="col-md-6 form-group">
                {{ Form::label('email_contact', 'Email', ['class' => 'control-label']) }}
                {{ Form::text('email_contact[]', $info_contact->email_contact, ['id' => 'EmailContactEmployee', 'class' => 'form-control']) }}
            </div>
        </div>
        <div class="row">
            <div class="col-md-9 form-group">
                {{ Form::label('address_contact', 'Dirección', ['class' => 'control-label']) }}
                {{ Form::text('address_contact[]', $info_contact->address_contact, ['class' => 'form-control']) }}
            </div>
            <div class="col-md-3 form-group">
                {{ Form::label('tel_contact', 'Teléfono', ['class' => 'control-label']) }}
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-phone"></i>
                    </div>
                    {{ Form::text('tel_contact[]', $info_contact->tel_contact, ['class' => 'form-control']) }}
                </div>
            </div>
        </div>
        <br />
    </span>
    <?php $i++; ?>

@endforeach