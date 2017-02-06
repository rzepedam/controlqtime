<div class="row" xmlns="http://www.w3.org/1999/html">
    <div class="col-xs-12">
        <h6><b>Octavo: Duración del Contrato</b></h6>
    </div>
</div>
<br />
<div class="row">
    <div class="col-xs-12">
        Se deja constacia que el trabajador ingresó al servicio el
        <span class="text-capitalize"><b>{{ $contract->start_contract_to_spanish_format }}</b></span>
        y que el presente contrato de tipo {{ $contract->typeContract->name }} durará hasta
        <span class="text-capitalize"><b>{{ ($contract->typeContract->name === "Indefinido") ? "Indefinido" : Date::parse($contract->expires_at)->format('l j F Y') }}</b></span>.
        <br />
        <br />
        No obstante lo anterior, cualquiera de las partes podrá poner término a este contrato en conformidad con las disposiciones legales vigentes.
        <br />
        <br />
        También se deja constacia que su feriado anual básico es de <b>15</b> días hábiles.
    </div>
</div>