<div class="row">
    <div class="col-xs-12">
        <h6><b>Primero: Naturaleza de los Servicios y Lugar de Trabajo</b></h6>
    </div>
</div>
<br />
<div class="row">
    <div class="col-xs-12">
        El Trabajador se obliga a desempeñar el cargo de <span class="text-uppercase"><b>{{ $contract->position->name }}</b></span>, y las labores y funciones asociadas al mismo, que según la práctica naturaleza y/o la descripción de éstas el Trabajador declara expresamente conocer y aceptar.
    </div>
</div>
<br />
<div class="row">
    <div class="col-xs-12">
        El Trabajador ejercerá sus funciones en {{ $contract->company->address->address . ", " }}
        @if ($contract->company->address->detailAddressCompany->lot)
            {{ "Lote " . $contract->company->address->detailAddressCompany->lot . ", " }}
        @endif
        @if ($contract->company->address->detailAddressCompany->bod)
            {{ "Bodega " . $contract->company->address->detailAddressCompany->bod . ", " }}
        @endif
        @if ($contract->company->address->detailAddressCompany->floor)
            {{ "Piso " . $contract->company->address->detailAddressCompany->floor . ", " }}
        @endif
        @if ($contract->company->address->detailAddressCompany->ofi)
            {{ "Oficina " . $contract->company->address->detailAddressCompany->ofi . ", " }}
        @endif
        Comuna de {{ $contract->company->address->commune->name }}, {{ $contract->company->address->commune->province->name }}, sin perjuicio de lo anterior, podrá ser trasladado y/o desempeñarse también en otros lugares del país o del extranjero, según las necesidades del Empleador, todo ello de conformidad con la ley.
    </div>
</div>
<br />
<div class="row">
    <div class="col-xs-12">
        El Trabajador realizará las tareas en la forma y condiciones que le indiquen sus superiores jerárquicos.
    </div>
</div>