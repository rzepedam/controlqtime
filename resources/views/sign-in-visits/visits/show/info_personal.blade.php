@if ( ! is_null( $visit->state ) )
    <div class="form-group vertical-align-middle">
        <div class="pull-left">
            <button id="btnDenied" type="button" class="btn btn-sm btn-round btn-danger btn-pill-left waves-effect waves-round waves-light" {{ ($visit->state === 'denied') ? 'disabled' : '' }} data-id="{{ $visit->id }}"><i class="fa fa-times" aria-hidden="true"></i> Denegar</button>
            <button id="btnApproved" type="button" class="btn btn-sm btn-round btn-success btn-pill-right waves-effect waves-round waves-light" {{ ($visit->state === 'approved') ? 'disabled' : '' }} data-id="{{ $visit->id }}"><i class="fa fa-check" aria-hidden="true"></i> Aprobar</button>
        </div>
    </div>
    <span id="iconState">
        @if ($visit->state === 'approved')
            <i data-text="approved" class="fa fa-2x fa-check-circle-o pull-right text-success tooltip-success" data-toggle="tooltip" data-original-title="{{ trans('messages.' . $visit->state) }}" aria-hidden="true"></i>
        @elseif ($visit->state === 'denied')
            <i data-text="denied" class="fa fa-2x fa-times-circle-o pull-right text-danger tooltip-danger" data-toggle="tooltip" data-original-title="{{ trans('messages.' . $visit->state) }}" aria-hidden="true"></i>
        @else
            <i data-text="pending" class="fa fa-2x fa-exclamation-circle pull-right text-warning tooltip-warning" data-toggle="tooltip" data-original-title="{{ trans('messages.' . $visit->state) }}" aria-hidden="true"></i>
        @endif
    </span>
@else
    <div class="form-group">
        <i class="fa fa-2x fa-clock-o pull-right" data-toggle="tooltip" data-original-title="En Proceso" aria-hidden="true"></i>
    </div>
@endif
<br />
<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <tbody>
            <tr>
                <td class="col-md-3">Tipo Visita</td>
                <td class="text-center">
                    {{ $visit->typeVisit->name }}
                </td>
            </tr>
            <tr>
                <td class="col-md-3">Guía</td>
                <td class="text-center">
                    {{ $visit->user->employee->full_name }}
                </td>
            </tr>
            <tr>
                <td class="col-md-3">Recorrido</td>
                <td class="text-center">
                    {{ $visit->text_is_walking }}
                </td>
            </tr>
            <tr>
                <td class="col-md-3">Visita</td>
                <td class="text-center">
                    {{ $visit->full_name }}
                </td>
            </tr>
            <tr>
                <td class="col-md-3">Rut</td>
                <td class="text-center">
                    {{ $visit->rut }}
                </td>
            </tr>
            <tr>
                <td class="col-md-3">Cargo</td>
                <td class="text-center">
                    {{ $visit->position }}
                </td>
            </tr>
            <tr>
                <td class="col-md-3">Empresa</td>
                <td class="text-center">
                    {{ $visit->company }}
                </td>
            </tr>
            <tr>
                <td class="col-md-3">Teléfono</td>
                <td class="text-center">
                    {{ $visit->phone }}
                </td>
            </tr>
            <tr>
                <td class="col-md-3">Email</td>
                <td class="text-center">
                    {{ $visit->email }}
                </td>
            </tr>
            <tr>
                <td class="col-md-3">Fecha Visita</td>
                <td class="text-center">{{ $visit->date_more_hour }}</td>
            </tr>
            @if ( $visit->obs != '' )
                <tr>
                    <td class="col-md-3">Motivo</td>
                    <td class="text-center">{{ $visit->obs }}</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>