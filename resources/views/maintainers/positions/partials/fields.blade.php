
<div class="row">
    <div class="col-md-12">
        {{ Form::label('name', 'Nombre') }}
        {{ Form::text('name', null, ['class' => 'form-control', 'data-plugin' => 'maxlength', 'maxlength' => '30']) }}
    </div>
</div>
