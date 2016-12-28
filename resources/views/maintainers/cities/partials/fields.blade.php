<div class="row">
    <div class="col-md-6">
        {{ Form::label('name', 'Nombre', ['class' => 'control-label']) }}
        {{ Form::text('name', null, ['class' => 'form-control', 'data-plugin' => 'maxlength', 'maxlength' => '50']) }}
    </div>
    <div class="col-md-6">
    	{{ Form::label('country_id', 'País', ['class' => 'control-label']) }}
        @if (Route::is('cities.create'))
    	    {{ Form::select('country_id', $countries, null, ['class' => 'form-control']) }}
        @else
            {{ Form::select('country_id', is_null($city->country->deleted_at) ? $countries : ['default' => 'Seleccione País...'] + $countries->toArray(), null, ['class' => 'form-control']) }}
        @endif
    </div>
</div>
