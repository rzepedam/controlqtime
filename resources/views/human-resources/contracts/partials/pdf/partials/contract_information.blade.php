@php ( $i = 1 )
<div class="row">
    <div class="col-xs-1">
        {{ $i }}.-
    </div>
    <div class="col-xs-11 text-justify">
        El trabajador se compromete a ejecutar la labor de <b>{{ $contract->position->name }}</b> en
        {{ $contract->company->firm_name }} ubicado en calle {{ $contract->company->address }}
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
        Atendida la naturaleza de los servicios, se entenderá por lugar de trabajo toda la zona geográfica
        nacional o internacional conforme a esta área de la economía nacional y a la actividad principal de
        la empresa.
    </div>
</div>
<br />
@php ( $i++ )
<div class="row">
    <div class="col-xs-1">
        {{ $i }}.-
    </div>
    <div class="col-xs-11">
        La Jornada de Trabajo será de <b>{{ $contract->numHour->name }} horas</b>
        <b>{{ $contract->periodicityHour->name }}</b> de <b>{{ $contract->dayTrip->name }}</b>.
        <div class="row">
            <div class="col-xs-10 col-xs-offset-1">
                Mañana de <b>{{ $contract->init_morning }} hrs.</b> a <b>{{ $contract->end_morning }} hrs.</b>
            </div>
            <div class="col-xs-10 col-xs-offset-1">
                Tarde de <b>{{ $contract->init_afternoon }} hrs.</b> a <b>{{ $contract->end_afternoon }} hrs.</b>
            </div>
        </div>
    </div>
</div>
<br />
@php ( $i++ )
<div class="row">
    <div class="col-xs-1">
        {{ $i }}.-
    </div>
    <div class="col-xs-11 text-justify">
        El trabajo se efectuará de forma <b>{{ $contract->periodicityWork->name }}</b>.
    </div>
</div>
<br />
@php ( $i++ )
<div class="row">
    <div class="col-xs-1">
        {{ $i }}.-
    </div>
    <div class="col-xs-11 text-justify">
        El empleador se compromete a remunerar al Trabajador en la forma que se indica.
        <div class="row">
            <div class="col-xs-4 col-xs-offset-1">
                Sueldo Base
            </div>
            <div class="col-xs-7">
                <b>$ {{ $contract->salary }}</b>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-4 col-xs-offset-1">
                Movilización
            </div>
            <div class="col-xs-7">
                <b>$ {{ $contract->mobilization }}</b>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-4 col-xs-offset-1">
                Colación
            </div>
            <div class="col-xs-7">
                <b>$ {{ $contract->collation }}</b>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-4 col-xs-offset-1">
                Gratificación
            </div>
            <div class="col-xs-7">
                <b>{{ $contract->gratification->name }}</b>
            </div>
        </div>
    </div>
</div>
<br />
@php ( $i++ )
<div class="row">
    <div class="col-xs-1">
        {{ $i }}.-
    </div>
    <div class="col-xs-11 text-justify">
        El presente contrato tendrá una duración de <b>{{ $contract->typeContract->name }}</b>
    </div>
</div>