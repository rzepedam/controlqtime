<div class="form-group col-sm-2">
    {{ Form::label('init', 'Desde', ['class' => 'control-label']) }}
    <div id="startDate" class="input-group date" data-plugin="datepicker" data-end-date="{{ date('d-m-Y') }}">
        {{ Form::text('init', date('d-m-Y'), ['class' => 'form-control text-center', 'readonly']) }}
        <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
        </div>
    </div>
</div>
<div class="form-group col-sm-2">
    {{ Form::label('end', 'Hasta', ['class' => 'control-label']) }}
    <div id="endDate" class="input-group date" data-plugin="datepicker" data-end-date="{{ date('d-m-Y') }}">
        {{ Form::text('end', date('d-m-Y'), ['class' => 'form-control text-center', 'readonly']) }}
        <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
        </div>
    </div>
</div>
<div class="form-group col-sm-3">
    {{ Form::label('company_id', 'Empresa', ['class' => 'control-label']) }}
    {{ Form::select('company_id', $companies, null, ['class' => 'form-control', 'data-plugin' => 'selectpicker', 'data-live-search' => "true"]) }}
</div>
<div class="form-group col-sm-2">
    {{ Form::label('area_id', 'Área', ['class' => 'control-label']) }}
    <select id="area_id" name="area_id" class="form-control input-sm" data-plugin="selectpicker" data-live-search="true">
        <option data-icon="fa fa-search" value="">Seleccione</option>
        @foreach($areas as $area)
            <option value="{{ $area->id }}">{{ $area->name }}</option>
        @endforeach
    </select>
</div>
<div class="form-group col-sm-2">
    {{ Form::label('employee_id', 'Trabajador', ['class' => 'control-label']) }}
    <select id="employee_id" name="employee_id" class="form-control input-sm" data-plugin="selectpicker" data-live-search="true">
        <option data-icon="fa fa-search" value="">Seleccione</option>
        @foreach($employees as $employee)
            <option value="{{ $employee->id }}">{{ $employee->full_name }}</option>
        @endforeach
    </select>
</div>
<div class="form-group col-xs-12 col-sm-1" style="margin-top: 27px;">
    <div class="btn-group" role="group">
        <button type="button" class="btn btn-primary dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="false">
            <i class="fa fa-download" aria-hidden="true"></i>
            <span class="caret"></span>
        </button>
        <ul class="dropdown-menu" role="menu">
            <li role="presentation">
                <a href="javascript:void(0)" role="menuitem" onclick="event.preventDefault(); document.getElementById('getExcel').submit();">
                    <i class="fa fa-file-excel-o text-success" aria-hidden="true"></i> Exportar a Excel
                </a>
                {{ Form::open(['route' => 'getExcelDailyAssistance', 'method' => 'GET', 'id' => 'getExcel', 'style' => 'display: none;']) }}
                    {{ Form::hidden('init', date('d-m-Y'), ['class'  => 'initForm']) }}
                    {{ Form::hidden('end', date('d-m-Y'), ['class' => 'endForm']) }}
                    {{ Form::hidden('company_id', $companies->keys()[0], ['class' => 'companyForm']) }}
                    {{ Form::hidden('area_id', null, ['class' => 'areaForm']) }}
                    {{ Form::hidden('employee_id', null, ['class' => 'employeeForm']) }}
                {{ Form::close() }}
            </li>
            <li role="presentation">
                <a href="javascript:void(0)" role="menuitem" onclick="event.preventDefault(); document.getElementById('getPdf').submit();"> 
                    <i class="fa fa-file-pdf-o text-danger" aria-hidden="true"></i> Exportar a PDF
                </a>
                {{ Form::open(['route' => 'getPdfDailyAssistance', 'method' => 'GET', 'id' => 'getPdf', 'style' => 'display: none;']) }}
                    {{ Form::hidden('init', date('d-m-Y'), ['class'  => 'initForm']) }}
                    {{ Form::hidden('end', date('d-m-Y'), ['class' => 'endForm']) }}
                    {{ Form::hidden('company_id', $companies->keys()[0], ['class' => 'companyForm']) }}
                    {{ Form::hidden('area_id', null, ['class' => 'areaForm']) }}
                    {{ Form::hidden('employee_id', null, ['class' => 'employeeForm']) }}
                {{ Form::close() }}
            </li>
        </ul>
    </div>
</div>