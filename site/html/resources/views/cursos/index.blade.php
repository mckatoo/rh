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
		        <h1 class="page-header">Cursos</h1>
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
		    	<div class="table-responsive">
		    		<table class="table table-hover">
		    			<thead>
		    				<tr>
		    					<th>Curso</th>
		    					<th class="text-center">Coordenador</th>
		    					<th>Professores</th>
		    				</tr>
		    			</thead>
		    			<tbody>
					        @foreach ($cursos as $c)
			    				<tr>
			    					<td>{{ $c->curso }}</td>
			    					<td class="text-center">
			    						@if ($c->coordenador['nome'] == "")
				    						<a class="btn btn-xs btn-primary" data-toggle="modal" href='#modal-{{ $c->id }}'><i class="fa fa-plus-circle"></i></a>
				    					@else
				    						<a data-toggle="modal" href='#modal-{{ $c->id }}'>{{ $c->coordenador['nome'] }}</a>
			    						@endif
			    							<div class="modal fade" id="modal-{{ $c->id }}">
			    								<div class="modal-dialog">
			    									<div class="modal-content">
			    										<div class="modal-header">
			    											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			    											<h4 class="modal-title">Cadastrar Coordenador ao Curso de {{ $c->curso }}</h4>
			    										</div>
			    										<div class="modal-body form-group">
			    											{!! Form::open([
			    												'route' => 'cursos.addcoordenador',
			    												'method' => 'post'
			    											]) !!}
															{!! Form::hidden('id', $c->id) !!}
															{!! Form::label('professor', 'Professor', ['class' => 'sr-only']) !!}
															@if ($c->coordenador['nome'] == "")
																{!! Form::select('professor', $professores, null, [
																	'placeholder' => 'Selecione...',
																	'class' => 'form-control',
																	'id' => 'selectProfessor'
																]) !!}
															@else
																{!! Form::select('professor', $professores, $c->coordenador['id'], [
																	'placeholder' => 'Selecione...',
																	'class' => 'form-control',
																	'id' => 'selectProfessor'
																]) !!}
															@endif
															<br>
			    											{!! Form::reset('Cancelar', [
			    												'class' => 'btn btn-default',
			    												'data-dismiss' => 'modal'
			    											]) !!}
			    											{!! Form::submit('Salvar', [
			    												'class' => 'btn btn-primary'
			    											]) !!}
			    											{!! Form::close() !!}
			    										</div>
			    									</div>
			    								</div>
			    							</div>
			    					</td>
			    					<td>
			    						@foreach ($c->professores as $p)
			    							{{ $p->nome }} <br>
			    						@endforeach
			    					</td>
			    				</tr>
					        @endforeach
		    			</tbody>
		    		</table>
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
