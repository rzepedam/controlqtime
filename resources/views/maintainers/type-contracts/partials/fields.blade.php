<div class="row">
    {{-- Tipo Contrato Select Field --}}
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('name', 'Tipo Contrato') }}
            {{ Form::select('name', Config::get('enums.type_contracts'), null, ['class' => 'form-control']) }}
        </div>
    </div>
    {{-- Nº Meses Text Field --}}
    <div class="col-md-2">
        <div class="form-group">
            {{ Form::label('dur', 'Nº Meses') }}
            {{ Form::text('dur', null, ['class' => 'form-control text-center', 'data-plugin' => 'maxlength', 'maxlength' => '2']) }}
        </div>
    </div>
</div>
