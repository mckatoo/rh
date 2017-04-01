@extends('admin')

@section('linkcss')
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

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
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ elixir('assets/css/admin.css') }}">

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
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-user fa-fw"></i> CADASTRO DE USUÁRIOS
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="panel-body">
                        {!! Form::open(['route' => ['updateUser'], 'method' => 'POST', 'autocomplete' => 'off']) !!}
                        @if (session('sucesso'))
                            <div class="alert alert-success">
                                {{ session('sucesso') }}
                            </div>
                        @endif
                        @if(session('erro'))
                            <div class="alert alert-danger">
                                {{session('erro')}}
                            </div>
                        @endif
                        <div class="form-group col-lg-6">
                            {!! Form::label('name', 'Nome', ['class' => 'control-label']) !!}
                            {!! Form::text('name', $user->name, ['class' => 'form-control', 'id' => 'name', 'autofocus' => 'autofocus']) !!}
                        </div>
                        <div class="form-group col-lg-6">
                            {!! Form::label('email', 'E-Mail', ['class' => 'control-label']) !!}
                            {!! Form::email('email', $user->email, ['class' => 'form-control', 'id' => 'email', 'required' => 'required', 'readonly' => 'readonly']) !!}
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
                            {!! Form::select('tipo',$tipo,$user->tipo->id,['id' => 'tipo','class' => 'form-control']) !!}
                        </div>
                        <div class="panel-heading col-lg-12 ">
                            <div class="pull-right">
                                <button type="submit" class="btn btn-primary">Atualizar</button>
                            </div>
                        </div>
                        {!! Form::close() !!}
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

    <script src="{{ asset('js/milton.js') }}"></script>
@endsection
