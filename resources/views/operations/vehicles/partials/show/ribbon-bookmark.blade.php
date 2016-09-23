@if ($vehicle->state == 'enable')
    <div class="ribbon ribbon-bookmark ribbon-reverse ribbon-success">
        <span class="ribbon-inner">Estado : Activado</span>
    </div>
@else
    <div class="ribbon ribbon-bookmark ribbon-reverse ribbon-danger">
        <span class="ribbon-inner">Estado : No Activado</span>
    </div>
@endif
<div class="ribbon ribbon-bookmark ribbon-info">
    <span class="ribbon-inner">Cód. Interno : {{ $vehicle->code }}</span>
</div>