<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Mi sitio</title>

	<style type="text/css">
		.active{
			text-decoration: none;
			color: green;
		}
		.error {
			color: red;
			font-size: 12px;
		}
	</style>
</head>
<body>

	<header>

		<nav>
			<a class="{{ request()->is('/') ? 'active' : '' }} " 
				href=" {{ route('home') }}">Inicio</a>
			<a class="{{ request()->is('saludos/*') ? 'active' : '' }} "
				href=" {{ route('saludos','Jorge') }}">Saludos</a>
			<a class="{{ request()->is('message/create') ? 'active' : '' }} "
				href=" {{ route('messages.create') }}">Contactos</a>
				<a class="{{ request()->is('messages') ? 'active' : '' }} "
				href=" {{ route('messages.index') }}">Mensajes</a>
		</nav>
	</header>

	@yield('contenido')

	<footer>Copyright {{ date('Y')}} </footer>
</body>
</html>