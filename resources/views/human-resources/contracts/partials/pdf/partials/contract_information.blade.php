<table class="table table-bordered table-condensed">
    <tbody>
        @php ( $i = 1 )
        <tr>
            <td class="col-xs-1">
                {{ $i }}.-
            </td>
            <td class="col-xs-11 text-justify">
                El trabajador se compromete a ejecutar la labor de
                <span class="text-uppercase"><b>{{ $contract->position->name }}</b></span> en
                {{ $contract->company->firm_name }} ubicado en calle
                {{ $contract->company->address }}
                @if ($contract->company->lot)
                    {{ $contract->company->lot }}
                @endif
                @if ($contract->company->bod)
                    {{ $contract->company->bod }}
                @endif
                @if ($contract->company->floor)
                    {{ $contract->company->floor }}
                @endif
                @if ($contract->company->ofi)
                    {{ $contract->company->ofi }}
                @endif
                de la comuna de {{ $contract->company->commune->name }}, {{ $contract->company->commune->province->name }}.
                <p></p>
                Atendida la naturaleza de los servicios, se entenderá por lugar de trabajo toda la zona geográfica
                nacional o internacional conforme a esta área de la economía nacional y a la actividad principal de
                la empresa.
            </td>
        </tr>
        @php ( $i++ )
        <tr>
            <td class="col-xs-1">
                {{ $i }}.-
            </td>
            <td class="col-xs-11 text-justify">
                La Jornada de Trabajo será de {{ $contract->numHour->name }} horas
                {{ $contract->periodicityHour->name }} (es) de {{ $contract->dayTrip->name }}.
                <table class="table table-bordered table-condensed">
                    <tr>
                        <td>
                            <b>Mañana</b> de <b>{{ $contract->init_morning }} hrs.</b> a <b>{{ $contract->end_morning }} hrs.</b>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>Tarde</b> de <b>{{ $contract->init_afternoon }} hrs.</b> a <b>{{ $contract->end_afternoon }} hrs.</b>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        @php ( $i++ )
        <tr>
            <td class="col-xs-1">
                {{ $i }}.-
            </td>
            <td class="col-xs-11 text-justify">
                El trabajo se efectuará de forma {{ $contract->periodicityWork->name }}.
            </td>
        </tr>
        @php ( $i++ )
        <tr>
            <td class="col-xs-1">
                {{ $i }}.-
            </td>
            <td class="col-xs-11 text-justify">
                El empleador se compromete a remunerar al Trabajador en la forma que se indica.
                <table class="table table-bordered">
                    <tr>
                        <td class="col-xs-4">
                            Sueldo Base
                        </td>
                        <td class="col-xs-8">
                            $ {{ $contract->salary }}
                        </td>
                    </tr>
                    <tr>
                        <td class="col-xs-4">
                            Gratificación
                        </td>
                        <td class="col-xs-8">
                            {{ $contract->gratification->name }}
                        </td>
                    </tr>
                    <tr>
                        <td class="col-xs-4">
                            Movilización
                        </td>
                        <td class="col-xs-8">
                            $ {{ $contract->mobilization }}
                        </td>
                    </tr>
                    <tr>
                        <td class="col-xs-4">
                            Colación
                        </td>
                        <td class="col-xs-8">
                            $ {{ $contract->collation }}
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        @php ( $i++ )
        <tr>
            <td class="col-xs-1">
                {{ $i }}.-
            </td>
            <td class="col-xs-11 text-justify">
                El presente contrato tendrá la duración por <b>{{ $contract->typeContract->name }}</b>
            </td>
        </tr>
    </tbody>
</table>