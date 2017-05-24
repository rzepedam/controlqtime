@component('mail::message')
# Buenos días {{ $visit->full_name }}

Le informamos que la documentación ingresada para la visita a realizar el día {{ $visit->date_more_hour }} no ha superado nuestro proceso de validación. Le rogamos revisar nuevamente su documentación. Puede hacerlo desde el botón que se encuentra más abajo.

@component('mail::button', ['url' => $visit->url . '&key=' . $visit->key])
    Verificar Formulario
@endcomponent
<br />
<br />
Saludos.
<br>
Equipo {{ config('app.name') }}.

@component('mail::subcopy')
    Si tiene problemas al hacer click en el botón, copie y pegue el siguiente enlace en su navegador
    <a href="{{ $visit->url }}" target="_blank">{{ $visit->url . "&key=" . $visit->key }}</a>
@endcomponent

@endcomponent
