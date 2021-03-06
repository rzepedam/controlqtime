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
<div class="form-group col-sm-4">
    {{ Form::label('company_id', 'Empresa', ['class' => 'control-label']) }}
    <select id="company_id" name="company_id" class="form-control input-sm" data-plugin="selectpicker" data-live-search="true">
        @foreach($companies as $company)
            <option value="{{ $company->id }}">{{ $company->firm_name }}</option>
        @endforeach
    </select>
</div>
<div class="form-group col-sm-3">
    {{ Form::label('area_id', 'Área', ['class' => 'control-label']) }}
    <select id="area_id" name="area_id" class="form-control input-sm" data-plugin="selectpicker" data-live-search="true">
        @foreach($areas as $area)
            <option value="{{ $area->id }}">{{ $area->name }}</option>
        @endforeach
    </select>
</div>