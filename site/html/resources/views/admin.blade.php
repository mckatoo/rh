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
		Sistema desenvolvido pelo Departamento de Informática sob pedido do Departamento Pessoal da Uniesi.
	</footer>
</body>

</html>
