<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="col-xs-6 col-sm-4 col-md-3 form-group">
            {{ Form::label('date', 'Seleccione Fecha', ['class' => 'control-label']) }}
            <div class="input-group date" data-plugin="datepicker" data-end-date="{{ date('d-m-Y') }}">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
                {{ Form::text('date', date('d-m-Y'), ['class' => 'form-control text-center', 'readonly', 'id' => 'date']) }}
            </div>
        </div>
        <div class="col-xs-2 col-sm-2 col-md-2 form-group text-center font-size-20">
            <div id="access_control" class="num blue-600">{{ $accessControls->count() }}</div>
            <p>Accesos</p>
        </div>
        <div class="col-xs-2 col-sm-2 col-md-2 form-group text-center font-size-20">
            <div id="daily_assistance" class="num orange-600"><b>{{ $dailyAssistances->count() }}</b></div>
            <p>Asistencias</p>
        </div>
        <div class="col-xs-2 col-sm-2 col-md-2 form-group text-center font-size-20">
            <div id="num_employees" class="num green-600">{{ $num_employees->count() }}</div>
            <p>Trabajadores</p>
        </div>
    </div>
</div>