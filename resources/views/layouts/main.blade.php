<!doctype html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>@yield('title', 'Contact App ')</title>
	{{-- google font --}}
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Varela+Round">

	{{-- style --}}
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
	<link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">
</head>

<body>
	<!-- navbar -->
	<nav class="navbar navbar-expand-lg bg-light">
		<div class="container">
			<a class="navbar-brand text-uppercase"
			href="@guest /welcome @else /contacts @endguest">
				<strong><i class="bi bi-person-lines-fill me-1"></i>Contact</strong> App
			</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
				aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="navbar-collapse collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-lg-0 mb-2">
					@auth
						<li class="nav-item">
							<a class="nav-link" aria-current="page" href="#">Company</a>
						</li>
						<li class="nav-item">
							<a class="nav-link active" href="#">Contact</a>
						</li>
					@endauth
				</ul>

				<ul class="navbar-nav ml-auto">
					@guest
						<li class="nav-item mx-1"><a href="{{ route('login') }}" class="btn btn-outline-primary"><i
									class="bi bi-box-arrow-in-right me-1"></i>Login</a></li>
						<li class="nav-item mx-1"><a href="{{ route('register') }}" class="btn btn-outline-primary"><i
									class="bi bi-person-plus-fill me-1"></i></i>Register</a></li>
					@else
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
								{{ Auth::user()->name }}
							</a>
							<ul class="dropdown-menu">
								<a class="dropdown-item" href="#">Settings</a>
								<form action="{{ route('logout') }}" method="POST" style="display: inline;">
									@csrf
									<button class="dropdown-item">Logout</button>
								</form>
							</ul>
						</li>
					@endguest

				</ul>
			</div>
		</div>
	</nav>

	@yield('content')
	<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
