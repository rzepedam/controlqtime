@component('mail::message')
# Bienvenido(a) {{ $user->employee->full_name }}
Ya tienes acceso a <b>Controlqtime</b>. Tus credenciales de acceso son las siguientes:
<br />
<br />
@component('mail::panel')
<b>Usuario:</b> {{ $user->email }}
<br />
<b>Contraseña:</b> {{ $password }}
@endcomponent
<br />
<br />
Te sugerimos que cambies la contraseña inmediatamente desde aquí y recuerda adjuntar la documentación requerida para activar tu perfil.
@component('mail::button', ['url' =>  config('app.url') . '/users/' . $user->id . '/edit'])
Cambiar password
@endcomponent
<br />
Saludos.
<br>
Equipo Controlqtime.
@component('mail::subcopy')
Si tiene problemas al hacer click en el botón, copie y pegue el siguiente enlace en su navegador
<a url="{{ '/login' }}" target="_blank">{{ config('app.url') . '/users/' . $user->id . '/edit' }}</a>
@endcomponent

@endcomponent
