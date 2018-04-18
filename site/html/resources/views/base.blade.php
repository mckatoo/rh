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
		Sistema desenvolvido pelo Departamento de Informática sob pedido do Departamento Pessoal da Uniesi.
	</footer>

</body>

</html>
