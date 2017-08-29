@include('layout.messages.errors-js')

<div class="panel panel-bordered">
    <div class="panel-heading">
        <div class="row padding-top-20 padding-left-50 padding-right-50">
            <div class="form-group col-xs-12 col-sm-3">
                {{ Form::label('init', 'Desde', ['class' => 'control-label']) }}
                <div id="startDate" class="input-group date" data-plugin="datepicker" data-end-date="{{ date('d-m-Y') }}">
                    {{ Form::text('init', \Carbon\Carbon::parse(date('d-m-Y'))->subMonth()->format('d-m-Y'), ['class' => 'form-control text-center', 'readonly']) }}
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
            <div class="form-group col-xs-12 col-sm-3" style="margin-top: 27px;">
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-primary dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-download" aria-hidden="true"></i>
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li role="presentation">
                            <a target="_blank" href="javascript:void(0)" role="menuitem">
                                <i class="fa fa-file-excel-o text-success" aria-hidden="true"></i> Exportar a Excel
                            </a>
                        </li>
                        <li role="presentation">
                            <a href="javascript:void(0)" role="menuitem" onclick="event.preventDefault(); document.getElementById('getShowPdf').submit();"> 
                                <i class="fa fa-file-pdf-o text-danger" aria-hidden="true"></i> Exportar a PDF
                            </a>
                            {{ Form::open(['route' => ['getPdfShowEmployee', basename(request()->path())], 'method' => 'GET', 'id' => 'getShowPdf', 'style' => 'display: none;']) }}
                                {{ Form::hidden('init', \Carbon\Carbon::parse(date('d-m-Y'))->subMonth()->format('d-m-Y'), ['id'  => 'initForm']) }}
                                {{ Form::hidden('end', date('d-m-Y'), ['id' => 'endForm']) }}
                            {{ Form::close() }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="panel-body">
        <div class="row padding-left-50 padding-right-50">
            <div class="form-group">
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