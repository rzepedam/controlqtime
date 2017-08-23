<div class="panel panel-bordered">
    <div class="panel-heading">
        <div class="row padding-top-20 padding-left-50 padding-right-50">
            <div class="form-group col-xs-12 col-sm-3">
                {{ Form::label('init', 'Desde', ['class' => 'control-label']) }}
                <div id="startDate" class="input-group date" data-plugin="datepicker" data-end-date="{{ date('d-m-Y') }}">
                    {{ Form::text('init', date('d-m-Y'), ['class' => 'form-control text-center', 'readonly']) }}
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                </div>
            </div>
            <div class="form-group col-xs-12 col-sm-3">
                {{ Form::label('end', 'Hasta', ['class' => 'control-label']) }}
                <div id="endDate" class="input-group date" data-plugin="datepicker" data-end-date="{{ date('d-m-Y') }}">
                    {{ Form::text('end', date('d-m-Y'), ['class' => 'form-control text-center', 'readonly']) }}
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                </div>
            </div>
            <input type="checkbox" name="marks" /> Sólo Entrada
            <input type="checkbox" name="marks" /> Sólo Salida
        </div>
    </div>
    <div class="panel-body">
        <div class="row padding-left-50 padding-right-50">
            <div class="form-group">
                <h4>Filtros</h4>
                <table id="tblAssistances" class="table table-hover table-condensed table-striped display" width="100%">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th class="text-center">Dispositivo</th>
                        <th class="text-center">Entrada</th>
                        <th class="text-center">Salida</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>