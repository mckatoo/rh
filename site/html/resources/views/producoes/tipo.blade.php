@extends('admin')

@section('linkcss')
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Custom CSS -->
    {{-- <link rel="stylesheet" href="{{ elixir('assets/css/admin.css') }}"> --}}


     <!-- Bootstrap Core CSS -->
    <link href="{{ asset('/bower_components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{ asset('/bower_components/metisMenu/dist/metisMenu.min.css') }}" rel="stylesheet">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Custom CSS -->
    <link href="{{ asset('/dist/css/sb-admin-2.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/iesi.css') }}">

    <!-- Custom Fonts -->
    <link href="{{ asset('/bower_components/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">


@endsection

@section('content')
    <div id="page-wrapper">
		<div class="row">
		    <div class="col-lg-12">
		        <h1 class="page-header">Departamento Pessoal</h1>
		    </div>
		    <!-- /.col-lg-12 -->
		</div>
		<!-- /.row -->
		<div class="row">
		    @if (session('erro')!==null)
		        <div class="alert alert-danger">{{ session('erro') }}</div>
		    @endif
		    @if (session('success')!==null)
		        <div class="alert alert-success">{{ session('success') }}</div>
		    @endif
		    <div class="col-lg-12">
		    	<div class="panel panel-default">
		    		<div class="panel panel-heading">
		    			TIPOS DE PRODUÇÕES
		    			<a class="btn btn-primary btn-xs pull-right" data-toggle="modal" href='#modal-id'>Novo</a>
		    			<div class="modal fade" id="modal-id">
		    				<div class="modal-dialog">
		    					<div class="modal-content">
		    						<div class="modal-header">
		    							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		    							<h4 class="modal-title">Cadastrar novo tipo de produção.</h4>
		    						</div>
		    						<div class="modal-body">
		    							<form action="{{ route('producoes.addtipo') }}" method="POST" class="form-inline" role="form">
		    							{{ csrf_field() }}
		    								<div class="form-group">
		    									<label class="sr-only" for="tipo">Tipo</label>
		    									<input type="text" class="form-control" id="tipo" placeholder="Tipo" name="tipo" required="required" autofocus="autofocus">
		    								</div>
		    							<div class="modal-footer">
		    							<button type="reset" class="btn btn-default" data-dismiss="modal">Cancelar</button>
		    							<button type="submit" class="btn btn-primary">Salvar</button>
		    							</div>
		    							</form>
		    						</div>
	    						</div>
		    				</div>
		    			</div>
		    		</div>
		    		<div class="panel-body">
						<div class="table-responsive">
							<table class="table table-hover">
								<thead>
									<tr>
										<th>Tipo</th>
										<th>Criado em</th>
										<th>Atualizado em</th>
										<th>Apagar</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($tipo as $t)
										<tr>
											<td>
											<a data-toggle="modal" href='#editar{{ $t->id }}'>{{ $t->tipo }}</a>
							                    <div class="modal fade" id="editar{{ $t->id }}" data-backdrop="false">
							                        <div class="modal-dialog">
							                            <div class="modal-content">
							                                <div class="modal-header">
							                                    <button type="button" class="close" data-dismiss="modalx" aria-hidden="true" onclick="fecharModal('#editar{{ $t->id }}')">&times;</button>
							                                    <h4 class="modal-title red">Editar Tipo de Produção</h4>
							                                </div>
							                                <div class="modal-body">
								    							<form action="{{ route('producoes.addtipo') }}" method="POST" class="form-inline" role="form">
								    							{{ csrf_field() }}
								    							<input type="hidden" name="id" value="{{ $t->id }}">
								    								<div class="form-group">
								    									<label class="sr-only" for="tipo">Tipo</label>
								    									<input type="text" class="form-control" id="tipo" placeholder="Tipo" name="tipo" value="{{ $t->tipo }}" required="required" autofocus="autofocus">
								    								</div>
								    							<div class="modal-footer">
								    							<button type="reset" class="btn btn-default" data-dismiss="modal">Cancelar</button>
								    							<button type="submit" class="btn btn-primary">Salvar</button>
								    							</div>
								    							</form>
								    						</div>
							                            </div>
							                        </div>
							                    </div>
											</td>
											<td>{{ $t->created_at }}</td>
											<td>{{ $t->updated_at }}</td>
											<td class="text-center">
							                    <a class="btn btn-xs btn-danger" data-toggle="modal" href='#excluir{{ $t->id }}'>Excluir</a>
							                    <div class="modal fade" id="excluir{{ $t->id }}" data-backdrop="false">
							                        <div class="modal-dialog">
							                            <div class="modal-content">
							                                <div class="modal-header">
							                                    <button type="button" class="close" data-dismiss="modalx" aria-hidden="true" onclick="fecharModal('#excluir{{ $t->id }}')">&times;</button>
							                                    <h4 class="modal-title red">Confirmação</h4>
							                                </div>
							                                <div class="modal-body">
							                                    <div class="panel-red col-lg-12">
							                                        <div class="panel-heading">
							                                            <i class="fa fa-warning fa-2x"></i>
							                                            Tem certesa que deseja excluir o tipo de produção <i>"{{ $t->tipo }}"</i>?
							                                        </div>
							                                        <br>
							                                    </div>
							                                </div>
							                                <div class="modal-footer">
							                                    <button type="button" class="btn btn-default" data-dismiss="modalx" onclick="fecharModal('#excluir{{ $t->id }}')">Cancelar</button>
							                                    <a href="#" class="btn btn-danger" onclick="
							                                    post('{{ route('producoes.rmtipo') }}',
							                                    {
							                                        _token: '{{ csrf_token() }}',
							                                        id: '{{ $t->id }}',
							                                    });fecharModal('#excluir{{ $t->id }}');">Excluir</a>
							                                </div>
							                            </div>
							                        </div>
							                    </div>
							                </td>
										</tr>
									@endforeach
								</tbody>
							</table>
						</div>
		    		</div>
		    	</div>
		    </div>
		</div>
    </div>
    <!-- /#page-wrapper -->
@endsection

@section('scriptjs')
    <!-- jQuery -->
    <script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{ asset('bower_components/metisMenu/dist/metisMenu.min.js') }}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{ asset('dist/js/sb-admin-2.js') }}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{ asset('/dist/js/sb-admin-2.js') }}"></script>
    
    <!-- Milton JavaScript -->
    <script src="{{ asset('/js/milton.js') }}"></script>
    <script>
        $('#listPendentes').load('{{ route('prof.pendentes') }}');
        $('#listNotificacoes').load('{{ route('notificacoes.list') }}');
        
       setInterval(function () {
            $('.alert').addClass('hidden');
            $('#listPendentes').load('{{ route('prof.pendentes') }}');
            $('#listNotificacoes').load('{{ route('notificacoes.list') }}');
        }, 6000);
    </script>

@endsection
