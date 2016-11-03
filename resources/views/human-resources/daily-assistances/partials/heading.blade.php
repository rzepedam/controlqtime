<div class="row">
    <div class="col-sm-offset-1 col-xs-12 col-sm-10 col-md-10">
        <div class="col-xs-12 col-sm-4 col-md-3 form-group">
            {{ Form::label('date', 'Seleccione Fecha', ['class' => 'control-label']) }}
            <div class="input-group date" data-plugin="datepicker" data-end-date="{{ date('d-m-Y') }}">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
                {{ Form::text('date', date('d-m-Y'), ['class' => 'form-control text-center', 'readonly', 'id' => 'date']) }}
            </div>
        </div>
        {{-- Trabajador Select Field --}}
        <div class="col-xs-12 col-sm-8 col-md-6">
            <div class="form-group">
                {{ Form::label('employee_id', 'Trabajador') }}
                <select id="employee_id" name="employee_id" class="form-control" data-plugin="selectpicker" data-live-search="true">
                    <option data-icon="fa fa-search" value="*">Ver Todos</option>
                    @foreach($employees as $employee)
                        <option value="{{ $employee->id }}">{{ $employee->full_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-1 form-group text-center font-size-20 pull-right">
            <div id="access_control" class="num blue-600">{{ $accessControls->count() }}</div>
            <p><i class="fa fa-sign-in text-primary" aria-hidden="true"></i></p>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-1 form-group text-center font-size-20 pull-right">
            <div id="daily_assistance" class="num orange-600">{{ $dailyAssistances->count() }}</div>
            <p><i class="fa fa-check-square-o text-warning" aria-hidden="true"></i></p>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-1 form-group text-center font-size-20 pull-right">
            <div id="num_employees" class="num green-600">{{ $num_employees->count() }}</div>
            <p><i class="fa fa-users text-success" aria-hidden="true"></i></p>
        </div>
    </div>
</div>