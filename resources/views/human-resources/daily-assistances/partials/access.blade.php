<div class="row">
    <div class="col-md-12 strike">
        <span class="font-size-26"><b>Accesos</b></span>
    </div>
</div>
<br>
<br>
<div class="row">
    <div class="col-sm-10 col-md-10">
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
                <tbody id="data-access-update">
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
                                @if ( $output->search($accessControl->created_at) )
                                    <i class="fa fa-sign-out text-danger" aria-hidden="true"></i>
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
    </div>
</div>