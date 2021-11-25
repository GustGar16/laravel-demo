@component('mail::message')
# Bienvenido {{ $name }},

<p>Bienvenido al nuevo sistema de {{ config('app.name') }}.</p>
<p>Por favor, verifica tu cuenta en el siguiente botón.</p>

@component('mail::button', ['url' => url("user/verify/{$token}")])
Activar cuenta
@endcomponent

Gracias,<br>
{{ config('app.name') }}
@endcomponent
