<div class="row">
    <div class="col-md-12 strike">
        <span class="font-size-26"><b>Accesos</b></span>
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
                    @foreach($accessControls as $accessControl)
                        <tr>
                            <td>
                                {{ $loop->iteration }}
                            </td>
                            <td>
                                {{ $accessControl->employee->full_name }}
                            </td>
                            <td>
                                {{ $accessControl->num_device }}
                            </td>
                            <td class="text-center">
                                {{ Date::parse($accessControl->created_at)->format('H:i:s') }}
                            </td>
                            <td class="text-center">
                                <a href="{{ route('employees.show', $accessControl->employee->id) }}" class="btn btn-squared btn-info waves-effect waves-light">
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