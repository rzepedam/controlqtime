<div class="form-group text-center">
    <h3>Filtros</h3>
</div>
<br />
<div class="form-group">
    <h4 class="example-title"><i class="fa fa-sliders text-success padding-right-5" aria-hidden="true"></i> Rango</h4>
</div>    
<div class="form-group col-sm-offset-1 col-md-offset-1">
    {{ Form::label('init', 'Desde', ['class' => 'control-label']) }}
    <div id="startDate" class="input-group date" data-plugin="datepicker" data-end-date="{{ date('d-m-Y') }}">
        {{ Form::text('init', date('d-m-Y'), ['class' => 'form-control input-sm text-center']) }}
        <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
        </div>
    </div>
</div>
<div class="form-group col-sm-offset-1 col-md-offset-1">
    {{ Form::label('end', 'Hasta', ['class' => 'control-label']) }}
    <div id="endDate" class="input-group date" data-plugin="datepicker" data-end-date="{{ date('d-m-Y') }}">
        {{ Form::text('end', date('d-m-Y'), ['class' => 'form-control input-sm text-center']) }}
        <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
        </div>
    </div>
</div>
<hr />
<div class="form-group">
    <h4 class="example-title"><i class="fa fa-street-view text-danger padding-right-5" aria-hidden="true"></i> Trabajador</h4>
</div>
<div class="form-group col-sm-offset-1 col-md-offset-1">
    <select id="employee_id" name="employee_id" class="form-control input-sm" data-plugin="selectpicker" data-live-search="true">
        <option data-icon="fa fa-search" value="*">Seleccione</option>
        @foreach($employees as $employee)
            <option value="{{ $employee->id }}">{{ $employee->full_name }}</option>
        @endforeach
    </select>
</div>
<hr />
<div class="form-group">
    <h4 class="example-title"><i class="fa fa-building-o text-primary padding-right-5" aria-hidden="true"></i> Empresa</h4>
</div>
<div class="form-group col-sm-offset-1 col-md-offset-1">
    <select id="company_id" name="company_id" class="form-control input-sm" data-plugin="selectpicker" data-live-search="true">
        <option data-icon="fa fa-search" value="*">Seleccione</option>
        @foreach($companies as $company)
            <option value="{{ $company->id }}">{{ $company->firm_name }}</option>
        @endforeach
    </select>
</div>
<hr />
<div class="form-group">
    <h4 class="example-title"><i class="fa fa-sitemap text-warning padding-right-5" aria-hidden="true"></i> Área</h4>
</div>
<div class="form-group col-sm-offset-1 col-md-offset-1">
    <select id="area_id" name="area_id" class="form-control input-sm" data-plugin="selectpicker" data-live-search="true">
        <option data-icon="fa fa-search" vaue="*">Seleccione</option>
        @foreach($areas as $area)
            <option value="{{ $area->id }}">{{ $area->firm_name }}</option>
        @endforeach
    </select>
</div>