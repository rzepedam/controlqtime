<div class="row">
    <div class="col-xs-12">
        <h6><b>Quinto: Obligaciones y prohibiciones para el trabajador</b></h6>
    </div>
</div>
<br />
<div class="row">
    <div class="col-xs-12">
        El Trabajador tendrá las siguientes obligaciones y prohibiciones:
        <br />
        <br />
        @php( $i = 1 )
        @foreach($contract->termsAndObligatories as $termAndObligatory)

            {{ $i }}.- {{ $termAndObligatory->name }}.
            <br />
            @if (! $loop->last)
                <br />
            @endif

            @php( $i++ )

        @endforeach
    </div>
</div>