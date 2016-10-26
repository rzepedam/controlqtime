<div class="row">
    <div class="col-md-12 strike">
        <span class="font-size-26"><b>Accesos</b></span>
    </div>
</div>
<br>
<br>
<div class="row">
    <div class="col-sm-offset-1 col-xs-12 col-sm-10 col-md-10">
        <span id="data-access-table">
            @if ($accessControls->count() > 0)
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Trabajador</th>
                                <th class="text-center">Dispositivo</th>
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
                                        @if ( $entry->search($accessControl->created_at) )
                                            <i class="fa fa-sign-in text-success" aria-hidden="true"></i>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        {{ $accessControl->num_device }}
                                    </td>
                                    <td class="text-center">
                                        {{ $accessControl->created_at }}
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
            @else
                <div class="alert alert-danger alert-dismissible text-center" role="alert">
                    <i class="fa fa-exclamation-circle"></i> No existe información asociada
                </div>
            @endif
        </span>
    </div>
</div>