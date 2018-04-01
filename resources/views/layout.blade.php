<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<title>Mi sitio</title>

	<link rel="stylesheet" href="css/app.css" />

</head>
<body>

<nav class="navbar navbar-default" role="navigation">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">Larave App</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse navbar-ex1-collapse">
			<ul class="nav navbar-nav">
			<li class="{{ request()->is('/') ? 'active' : '' }} " ><a href=" {{ route('home') }}">Inicio</a>
			</li>
			<li class="{{ request()->is('saludos/*') ? 'active' : '' }} "><a href=" {{ route('saludos','Jorge') }}">Saludos</a>
			</li>
			<li class="{{ request()->is('message/create') ? 'active' : '' }} "><a href=" {{ route('messages.create') }}">Contactos</a>
			</li>
			@if (auth()->check())
				<li class="{{ request()->is('messages') ? 'active' : '' }} "><a
					href=" {{ route('messages.index') }}">Mensajes</a>
				</li>
				@if (auth()->user()->hasRoles(['Admin']))
					<li class="{{ request()->is('users') ? 'active' : '' }} "><a
						href=" {{ route('users.index') }}">Usuarios</a>
					</li>
				@endif
			@endif
			</ul>
			<ul class="nav navbar-nav navbar-right">
				@if (auth()->guest())
					<li class="{{ request()->is('login') ? 'active' : '' }} "><a href=" /login">Login</a>
				@else
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ auth()->user()->email }} <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="/logout">Cerrar sesión</a></li>
					</ul>
				</li>
			@endif
			</ul>
		</div><!-- /.navbar-collapse -->
	</div>
</nav>

	<header>
		<nav>
			
		</nav>
	</header>

	@yield('contenido')

	<footer>Copyright {{ date('Y')}} </footer>
	<script src="/js/all.js"></script>
</body>
</html>