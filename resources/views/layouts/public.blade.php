<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>@yield('title', 'Contact App')</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Varela+Round">
	<!-- Style -->
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
				</ul>
				<form class="d-flex" role="search">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item mx-1"><a href="{{ route('login') }}" class="btn btn-outline-secondary">Login</a>
						</li>
						<li class="nav-item mx-1"><a href="{{ route('register') }}" class="btn btn-outline-primary">Register</a>
						</li>
					</ul>
				</form>
			</div>
		</div>
	</nav>
	<!-- content -->
	@yield('content')

	{{-- Footer --}}
	<footer class="footer py-5">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md">
					<strong>Contact App</strong>
					<small class="d-block mb-3">©2023</small>
				</div>
				<div class="col-6 col-md">
					<h5>Features</h5>
					<ul class="list-unstyled text-small">
						<li><a href="#" class="text-decoration-none">Email Marketing</a></li>
						<li><a href="#" class="text-decoration-none">Email Template</a></li>
						<li><a href="#" class="text-decoration-none">Email Broadcast</a></li>
						<li><a href="#" class="text-decoration-none">Autoresponder Email</a></li>
						<li><a href="#" class="text-decoration-none">RSS-to-Email</a></li>
					</ul>
				</div>
				<div class="col-6 col-md">
					<h5>Resources</h5>
					<ul class="list-unstyled text-small">
						<li><a href="#" class="text-decoration-none">Landing page Guide</a></li>
						<li><a href="#" class="text-decoration-none">Inbound Marketing Guide</a></li>
						<li><a href="#" class="text-decoration-none">Email Marketing Guide</a></li>
						<li><a href="#" class="text-decoration-none">Helpdesk Guide</a></li>
					</ul>
				</div>
				<div class="col-6 col-md">
					<h5>About</h5>
					<ul class="list-unstyled text-small">
						<li><a href="#" class="text-decoration-none">Team</a></li>
						<li><a href="#" class="text-decoration-none">Locations</a></li>
						<li><a href="#" class="text-decoration-none">Privacy</a></li>
						<li><a href="#" class="text-decoration-none">Terms</a></li>
					</ul>
				</div>
			</div>
		</div>
	</footer>
	<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
