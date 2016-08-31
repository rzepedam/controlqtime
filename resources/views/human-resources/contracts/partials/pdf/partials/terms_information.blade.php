@php( $i = 1 )
@foreach($contract->termsAndObligatories as $termAndObligatory)

    <div class="row">
        <div class="col-xs-1 col-xs-offset-1">
            {{ $i }} .-
        </div>
        <div class="col-xs-9 text-justify">
            {{ $termAndObligatory->name }}
        </div>
    </div>
    <br />
    @php( $i++ )

@endforeach

<div class="row">
    <div class="col-xs-1 col-xs-offset-1">
        {{ $i }} .-
    </div>
    <div class="col-xs-9 text-justify">
        Se deja constancia que <b>{{ $contract->employee->full_name }}</b> ingresó al servicio el
        día <b>{{ Date::parse(date('d-m-Y'))->format('l j F Y') }}</b>
    </div>
</div>
@php ($i++)
<br />
<div class="row">
    <div class="col-xs-1 col-xs-offset-1">
        {{ $i }} .-
    </div>
    <div class="col-xs-9 text-justify">
        El Trabajador se encuentra afiliado a <b>Isapre {{ $contract->employee->forecast->name }}</b> y
        <b>AFP {{ $contract->employee->pension->name }}</b>
    </div>
</div>
<br />
<br />
<div class="text-justify">
    Este contrato caduca al no cumplir con las estipulaciones del mismo y cuando concurran para ello causas
    justificadas en confirmidad a las leyes vigentes. El presente contrato se firma en dos ejemplares del mismo
    tenor dejando expresa constancia que en este acto el trabajador recibe uno de ellos.
</div>