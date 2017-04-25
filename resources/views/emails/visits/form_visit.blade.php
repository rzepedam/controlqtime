@component('mail::message')
# Bienvenido(a) {{ $visit->full_name }}

Para finalizar el proceso de registro de su visita, es necesario que complete la información faltante de su perfil.
Esto lo puede efectuar haciendo click en el botón que se encuentra más abajo.<br /><br />
Una vez recibida la información le
confirmaremos a la brevedad el estado de su visita.

@component('mail::button', ['url' => $visit->url . '&key=' . $visit->key])
    Completar Formulario
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
