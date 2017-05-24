@component('mail::message')
# {{ $visit->full_name }}
<br />

Le informamos que la visita solicitada a realizar el día {{ $visit->date_more_hour }} ha sido confirmada satisfactoriamente. 

<br />
<br />
Saludos.
<br>
Equipo {{ config('app.name') }}.

@endcomponent
