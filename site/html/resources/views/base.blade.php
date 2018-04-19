<!DOCTYPE html>
<html lang="pt-br">

@include('paginas.head')

<body>
	@yield('menu')
	<div id="wrapper">
		@yield('content')
	</div>

	@yield('footer')

	@yield('scriptjs')

	<footer class="footer">
		Sistema desenvolvido por Milton Carlos Katoo <u><i>"16056-3"</i></u> sob consultoria de Miriam Aparecida Augusto dos Santos <u><i>""</i></u>.
	</footer>

</body>

</html>
