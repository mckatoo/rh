@extends('admin')

@section('linkcss')
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('/bower_components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{ asset('/bower_components/metisMenu/dist/metisMenu.min.css') }}" rel="stylesheet">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    {{--  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->  --}}
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
        
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach
            </div>
        @endif
        @if(session('erro'))
            <div class="alert alert-danger">
                {{session('erro')}}
            </div>
        @endif
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-user fa-fw"></i> CADASTROS DE USUÁRIOS

                        <a class="btn btn-xs btn-primary pull-right" data-toggle="modal" href='#modalUsuario'>Novo</a>
                        <div class="modal fade" id="modalUsuario">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title">Novo Usuário</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            {!! Form::open(['url' => ['registrar'], 'method' => 'POST', 'autocomplete' => 'off']) !!}
                                            <div class="form-group col-lg-6">
                                                {!! Form::label('name', 'Nome', ['class' => 'control-label']) !!}
                                                {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'autofocus' => 'autofocus']) !!}
                                            </div>
                                            <div class="form-group col-lg-6">
                                                {!! Form::label('email', 'E-Mail', ['class' => 'control-label']) !!}
                                                {!! Form::email('email', null, ['class' => 'form-control', 'id' => 'email']) !!}
                                            </div>
                                            <div class="form-group col-lg-6">
                                                {!! Form::label('password', 'Senha', ['class' => 'control-label']) !!}
                                                {!! Form::password('password', ['class' => 'form-control', 'id' => 'password']) !!}
                                            </div>
                                            <div class="form-group col-lg-6">
                                                {!! Form::label('password_confirmation', 'Confirmar senha', ['class' => 'control-label']) !!}
                                                {!! Form::password('password_confirmation', ['class' => 'form-control', 'id' => 'password_confirmation']) !!}
                                            </div>
                                            <div class="form-group col-lg-6">
                                                {!! Form::label('tipo', 'Tipo de usuário', ['class' => 'control-label', 'id' => 'tipo']) !!}
                                                {!! Form::select('tipo',$tipo,null,['id' => 'tipo','placeholder' => 'Selecione...','class' => 'form-control'],null) !!}
                                            </div>
                                            <div class="modal-footer col-lg-12">
                                                <button type="reset" class="btn btn-default" onclick="$('#modalUsuario').modal('toggle')">Cancelar</button>
                                                <button type="submit" class="btn btn-primary">Salvar</button>
                                            </div>
                                            {!! Form::close() !!}
                                        </div>
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
                                        <th>Usuário</th>
                                        <th>E-Mail</th>
                                        <th>Tipo</th>
                                        <th>Criado em</th>
                                        <th>Atualizado em</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $u)
                                        <tr>
                                            <td><a href="{{ route('perfil',$u->id) }}">{{ $u->name }}</a></td>
                                            <td>{{ $u->email }}</td>
                                            <td>{{ $u->tipo->tipo }}</td>
                                            <td>{{ $u->created_at }}</td>
                                            <td>{{ $u->updated_at }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>

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
@endsection
