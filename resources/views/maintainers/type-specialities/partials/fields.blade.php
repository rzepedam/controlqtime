<div class="row">
    <div class="col-md-12">
        {{ Form::label('name', 'Nombre', ['class' => 'control-label']) }}
        {{ Form::text('name', null, ['class' => 'form-control find-for-restore', 'data-plugin' => 'maxlength', 'maxlength' => '75']) }}
    </div>
</div>
