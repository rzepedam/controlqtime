<div class="row">
    <div class="col-xs-12">
        <h6><b>Octavo: Duración del Contrato</b></h6>
    </div>
</div>
<br />
<div class="row">
    <div class="col-xs-12">
        Se deja constacia que el trabajador ingresó al servicio el <span class="text-capitalize"><b>{{ Date::parse(date('d-m-Y'))->format('l j F Y') }}</b></span> y que el presente contrato es {{ $contract->typeContract->name }}.
        <br />
        <br />
        No obstante lo anterior, cualquiera de las partes podrá poner término a este contrato en conformidad con las disposiciones legales vigentes.
        <br />
        <br />
        También se deja constacia que su feriado anual básico es de <b>15</b> días hábiles.
    </div>
</div>