<!DOCTYPE html>
<html lang="pt-br">

@include('paginas.head')

<body>
	@if (Auth::user()->tipo->tipo == "Administrador")
	    <div>
	        @include('paginas.navbar')
	        @yield('content')
	    </div>
	@else
		@yield('menu')
	    <div>
	        @yield('content')
	    </div>
	@endif

@yield('scriptjs')

</body>

</html>