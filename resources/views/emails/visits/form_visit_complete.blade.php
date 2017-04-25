@component('mail::message')
# Formulario de Visita {{ $visit->full_name }}

Te informamos que la visita coordinada para el día <b>{{ $visit->date_more_hour }}</b> miembro de la empresa
{{ $visit->company }} ha adjuntado la documentación pertinente y se encuentra a la espera de aprobación.
<br /><br />
Si deseas ver el detalle, puedes acceder del botón que se encuentra aquí debajo.

@component('mail::button', ['url' => $url . '/sign-in-visits/visits/' . $visit->id] )
    Ver Detalle
@endcomponent
<br />
<br />
Saludos.
<br>
Equipo {{ config('app.name') }}.

@component('mail::subcopy')
Si tiene problemas al hacer click en el botón, copie y pegue el siguiente enlace en su navegador
<a href="{{ $url . '/sign-in-visits/visits/' . $visit->id }}" target="_blank">{{ $url . '/sign-in-visits/visits/' . $visit->id }}</a>
@endcomponent

@endcomponent
