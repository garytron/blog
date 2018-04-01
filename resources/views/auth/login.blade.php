@extends('layout')

@section('contenido')
	<h1>Login</h1>
	<form method="POST" action="/login">
		{{ csrf_field() }}
		<input type="email" name="email" placeholder="email">
		<br>
		<input type="password" name="password" placeholder="password">
		<input type="submit" value="Entrar">
	</form>
@endsection