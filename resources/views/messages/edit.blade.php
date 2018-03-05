@extends('layout')

@section('contenido')

	<h1>Editar mensaje</h1>

	<form method="POST" action="{{ route('messages.update', $message->id) }}">
	@method('put')
  	@csrf
	<label for="nombre">
		Nombre
		<input type="text" name="nombre" value="{{ $message->nombre }}">
		{!! $errors->first('nombre','<span class=error>:message</span>') !!}
	</label>
	<br>
	<label for="email">
		Email
		<input type="email" name="email" value="{{ $message->email }}">
		{!! $errors->first('email','<span class=error>:message</span>') !!}
	</label>
	<br>
	<label for="mensaje">
		Mensaje
		<input type="text" name="mensaje" value="{{ $message->mensaje }}">
		{!! $errors->first('mensaje','<span class=error>:message</span>') !!}
	</label>
	<input type="submit" value="Enviar">
	</form>
@endsection