<div class="row">
    <div class="col-md-4">
        {{ Form::label('name', 'Nombre', ['class' => 'control-label']) }}
        {{ Form::text('name', null, ['class' => 'form-control find-for-restore', 'data-plugin' => 'maxlength', 'maxlength' => '50']) }}
    </div>
    <div class="col-md-8">
        {{-- Dirección Form Input --}}
        <div class="form-group">
            {{ Form::label('address', 'Dirección', ['class' => 'control-label']) }}
            {{ Form::text('address', null, ['class' => 'form-control', 'data-plugin' => 'maxlength', 'maxlength' => '255']) }}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        {{-- Región Form Select --}}
        <div class="form-group">
            {{ Form::label('region_id', 'Región', ['class' => 'control-label']) }}
            {{ Form::select('region_id', $regions, Route::is('terminals.create') ? null : $terminal->commune->province->region->id, ['class' => 'form-control']) }}
        </div>
    </div>
    <div class="col-md-4">
        {{-- Provincia Form Select --}}
        <div class="form-group">
            {{ Form::label('province_id', 'Provincia', ['class' => 'control-label']) }}
            {{ Form::select('province_id', $provinces, Route::is('terminals.create') ? null : $terminal->commune->province->id, ['class' => 'form-control']) }}
        </div>
    </div>
    <div class="col-md-4">
        {{-- Comuna Form Select --}}
        <div class="form-group">
            {{ Form::label('commune_id', 'Comuna', ['class' => 'control-label']) }}
            {{ Form::select('commune_id', $communes, null, ['class' => 'form-control']) }}
        </div>
    </div>
</div>
