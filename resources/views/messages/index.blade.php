@extends('layout')

@section('contenido')
	<h1>Todos los mensajes</h1>
	<table width="100%"	border="1">
		<thead>
			<tr>
				<th>ID</th>
				<th>Nombre</th>
				<th>Email</th>
				<th>Mensaje</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>
			@foreach($messages as $ms)
				<tr>
					<td>{{ $ms->id }} </td>
					<td>
						<a href="{{ route('messages.show', $ms->id) }}">
					{{ $ms->nombre }} </a></td>
					<td>{{ $ms->email }} </td>
					<td>{{ $ms->mensaje }} </td>
					<td><a href="{{ route('messages.edit', $ms->id) }}"> Editar </a>
						<form style="display:inline" method="POST" action="{{ route('messages.destroy', $ms->id)}}">
							@method('delete')
							@csrf

							<button type="submit">Eliminar</button>
						</form>
					</td>

				</tr>
			@endforeach
		</tbody>
	</table>
@endsection