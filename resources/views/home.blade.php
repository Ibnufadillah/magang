<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Portal Akademik |  @yield('title')</title>
	<link rel="icon" href="{{ asset('img/icon.ico') }}" type="image/x-icon">

    <link href="{{ asset('css/all.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('template/css/styles.css') }}" rel="stylesheet" />
	<script src="{{ asset('js/jquery-3.5.1.slim.min.js') }}"></script>

	<link href="{{ asset('css/') }}/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />


</head>
<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">Portal Akademik</a>
		{{-- @if (auth()->user()) --}}
        	<button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
        <div class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        </div>
        <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <div class="dropdown-menu dropdown-menu-right " aria-labelledby="userDropdown">
					<div class="dropdown-item">
						<form id="logout-form" action="#" method="POST" class="">
							@csrf
							<button class="btn btn-flat" type="submit"><i class="fas fa-sign-out-alt"></i> Logout</button>
	
						</form>
					</div>


                </div>
            </li>
        </ul>
		{{-- @endif --}}

    </nav>	
	<div id="layoutSidenav">
		
		<div id="layoutSidenav_nav">
			@include('layout.v_nav')
		</div>
		<div id="layoutSidenav_content">
			<main>
                {{-- @yield('content') --}}
			</main>
			<footer class="py-4 bg-light mt-auto">
				<div class="container-fluid">
					<div class="row d-flex align-items-center justify-content-between small">
						<div class="col-auto">
							<div class="text-muted">Copyright &copy; AS 2021</div>
						</div>
						<div class="col-auto mt-2">
							<div>
								<a href="#">Privacy Policy</a>
								&middot;
								<a href="#">Terms &amp; Conditions</a>
							</div>
						</div>
					</div>
				</div>
			</footer>
		</div>
	</div>
    <script src="{{ asset('template/js/script.js') }}"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

	<script src="{{ asset('js/') }}/jquery.dataTables.min.js" crossorigin="anonymous"></script>

	<script src="{{ asset('js/') }}/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
	<script src="{{ asset('js/') }}/canvasjs.min.js"></script>

</body>
</html>