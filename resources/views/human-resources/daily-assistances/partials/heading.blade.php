<div class="row">
    <div class="col-sm-offset-1 col-md-offset-1 col-sm-10 col-md-10">
        <ul class="panel-info">
            <li>
                <div class="num blue-600">{{ $accessControls->count() }}</div>
                <p>Accesos</p>
            </li>
            <li>
                <div class="num orange-600">{{ $dailyAssistances->count() }}</div>
                <p>Asistencias</p>
            </li>
            <li>
                <div class="num green-600">{{ $num_employees->count() }}</div>
                <p>Trabajadores</p>
            </li>
        </ul>
    </div>
</div>