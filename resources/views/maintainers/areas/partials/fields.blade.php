<div class="row">
    <div class="col-md-7">
        {{ Form::label('name', 'Nombre', ['class' => 'control-label']) }}
        {{ Form::text('name', null, ['class' => 'form-control', 'data-plugin' => 'maxlength', 'maxlength' => '50']) }}
    </div>
    <div class="col-md-5">
        {{ Form::label('terminal_id', 'Terminal', ['class' => 'control-label']) }}
        @if (Route::is('areas.create'))
            {{ Form::select('terminal_id', $terminals, null, ['class' => 'form-control']) }}
        @else
            {{ Form::select('terminal_id', is_null($area->terminal->deleted_at) ? $terminals : ['default' => 'Seleccione Terminal...'] + $terminals->toArray(), null, ['class' => 'form-control']) }}
        @endif
    </div>
</div>
