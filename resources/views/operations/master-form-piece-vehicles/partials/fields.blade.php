<div class="row">
    <div class="col-md-12">
        {{ Form::label('name', 'Nombre', ['class' => 'control-label']) }}
        {{ Form::text('name', null, ['class' => 'form-control', 'data-plugin' => 'maxlength', 'maxlength' => '50']) }}
    </div>
</div>
<br />
<br />
<div class="row">
    <div class="col-md-12">
        <h4>Seleccione piezas que desea incorporar</h4>
    </div>
</div>
<br />

@php ( $nextColumn = round(count($pieceVehicles)/3) )
@php ( $i = 0 )

<div class="row">
    <div class="col-xs-12 col-sm-4 col-md-4">
        <ul class="list-task list-group margin_terms_and_obligatories">
            @foreach($pieceVehicles as $pieceVehicle)
                <li class="list-group-item task-done">
                    <div class="checkbox-custom checkbox-primary text-justify">
                        @if ( Route::is('master-form-piece-vehicles.edit') )
                            <input type="checkbox" id="piece{{ $i }}" name="piece_id[]" value="{{ $pieceVehicle->id }}" {{ $masterFormPieceVehicle->pieceVehicles->contains($pieceVehicle->id) ? 'checked' : null }} >
                        @else
                            <input type="checkbox" id="piece{{ $i }}" name="piece_id[]" value="{{ $pieceVehicle->id }}" >
                        @endif
                        <label for="piece{{ $i }}">
                            <span>{{ $pieceVehicle->name }}</span>
                        </label>
                    </div>
                </li>

                @if ( $loop->iteration % $nextColumn == 0 )
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4">
                        <ul class="list-task list-group margin_terms_and_obligatories">
                @endif

                @php ( $i ++ )

            @endforeach
        </ul>
    </div>
</div>
