<!doctype html>
<html lang="en">
  <head>
  	<title>Certificados Gerscol👨‍⚕️</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="/css/style.css">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.min.css">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css" rel="stylesheet"/>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"></head>



  </head>
  <body>
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
	          <i class="fa fa-bars"></i>
	          <span class="sr-only">Toggle Menu</span>
	        </button>
        </div>
				<div class="p-4 pt-5">
                <img class="imglogo" href="{{ url('/') }}" src="https://www.gerscol.com/aulavirtual/pluginfile.php/1/core_admin/logo/0x200/1593402193/logo-gerscol-blanco.png" alt="Girl in a jacket" width="500" height="600">
	        <ul class="list-unstyled components mb-5">
                <ul class="navbar-nav ml-auto">

                    <li class=" {{ request()->routeIs('contact') ? 'active' : ''}}"> <a href="/busqueda">Estudiantes</a></li>

                    <li class=" {{ request()->routeIs('contact') ? 'active' : ''}}"> <a href="/contact">Empresas</a></li>

                    @auth
                    <li class=" {{ request()->routeIs('students') ? 'active' : ''}}"> <a href="/students">Gestionar Estudiantes</a></li>
                    @endauth

                    @auth
                    <li class=" {{ request()->routeIs('courses.*') ? 'active' : ''}}"> <a href="/courses">Gestionar Cursos</a></li>
                    @endauth

                    @auth
                    <li class=" {{ request()->routeIs('certificate') ? 'active' : ''}}"> <a href="/certificate">Gestionar Certificados</a></li>
                    @endauth

                     @guest
                    <li>
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Ingresar') }}</a>
                            </li>
                        @endif   </li>

                        @else
                    <li><a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                         {{ __('cerrar sesión') }}
                     </a>

                     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                         @csrf
                     </form>
                    </li>

                    @endguest

	        <div class="footer">
	        	<p> Todos los derechos reservados &copy; <script>document.write(new Date().getFullYear());</script> <i class="icon-heart" aria-hidden="true"></i> Desarrollado Por: <br> <a href="mailto:miiguellagellmc@gmail.com" target="_blank">Miguel Angel</a></p>
	        </div>

	      </div>
    	</nav>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">
            @yield('content')
		</div>



        <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

    <!-- (Optional) Latest compiled and minified JavaScript translation files -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/i18n/defaults-*.min.js"></script>
  </body>
</html>
