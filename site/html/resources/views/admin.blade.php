<!DOCTYPE html>
<html lang="pt-br">

@include('paginas.head')

<body>

	<div id="wrapper">
		@include('paginas.navbar')
		@yield('content')
	</div>

	@yield('scriptjs')
	<footer class="footer">
		Sistema desenvolvido por Milton Carlos Katoo <u><i>"16056-3"</i></u> sob consultoria de Miriam Aparecida Augusto dos Santos <u><i>""</i></u>.
	</footer>
</body>

</html>
