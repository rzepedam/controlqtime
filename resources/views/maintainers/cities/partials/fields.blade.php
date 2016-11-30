<div class="row">
    <div class="col-md-6">
        {{ Form::label('name', 'Nombre', ['class' => 'control-label']) }}
        {{ Form::text('name', null, ['class' => 'form-control find-for-restore', 'data-plugin' => 'maxlength', 'maxlength' => '50']) }}
    </div>
    <div class="col-md-6">
    	{{ Form::label('country_id', 'País', ['class' => 'control-label']) }}
    	{{ Form::select('country_id', $countries, null, ['class' => 'form-control']) }}
    </div>
</div>
