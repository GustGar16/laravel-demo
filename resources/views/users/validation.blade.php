@extends('layouts.app')

@section('content')

<div class="container text-center">
	<h1>Bienvenido</h1>
	<h6>{{ $user->name }},</h6>
	<p>Tu cuenta ha sido activada.</p>
	<a href="{{ route('home') }}">Volver a la pagina inicial</a>
</div>

@endsection