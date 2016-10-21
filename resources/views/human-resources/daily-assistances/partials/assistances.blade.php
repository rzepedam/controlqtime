<div class="row">
    <div class="col-md-12 strike">
        <span class="font-size-26"><b>Asistencias</b></span>
    </div>
</div>
<br>
<br>
<div class="row">
    <div class="col-sm-offset-1 col-md-offset-1 col-sm-10 col-md-10">
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Trabajador</th>
                    <th>Dispositivo</th>
                    <th class="text-center">Hora</th>
                    <th class="text-center"></th>
                </tr>
                </thead>
                <tbody>
                    @foreach($dailyAssistances as $dailyAssistance)
                        <tr>
                            <td>
                                {{ $loop->iteration }}
                            </td>
                            <td>
                                {{ $dailyAssistance->employee->full_name }}
                            </td>
                            <td>
                                {{ $dailyAssistance->num_device }}
                            </td>
                            <td class="text-center">
                                {{ Date::parse($dailyAssistance->created_at)->format('H:i:s') }}
                            </td>
                            <td class="text-center">
                                <a href="{{ route('employees.show', $dailyAssistance->employee->id) }}" class="btn btn-squared btn-info waves-effect waves-light tooltip-info">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>