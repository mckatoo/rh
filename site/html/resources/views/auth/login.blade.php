@extends('base')

@section('linkcss')
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{ asset('bower_components/metisMenu/dist/metisMenu.min.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('dist/css/sb-admin-2.css') }}" rel="stylesheet">
    <link href="{{ asset('css/iesi.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('content')
    <div id="container">
        <!-- /.row -->
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    @if (count($errors) > 0)
                       <div class="alert alert-danger">
                           <ul>
                               @foreach ($errors->all() as $error)
                                   <li class="list-unstyled">{{ $error }}</li>
                               @endforeach
                           </ul>
                       </div>
                    @endif
                    @if (session('erro')!==null)
                      <div class="alert alert-danger">{{session('erro')}}</div>
                    @endif
                    <div class="panel-heading">
                        <h3 class="panel-title">Autenticação</h3>
                    </div>
                    <div class="panel-body">
                        {!! Form::open(['route' => ['login'], 'method' => 'POST', 'role' => 'form']) !!}
                        {!! Form::token() !!}
                        <fieldset>
                            <div class="form-group">
                                {!! Form::label('email', 'E-Mail', ['class' => 'control-label']) !!}
                                {!! Form::email('email', null, ['class' => 'form-control','id' => 'email','autofocus' => 'autofocus']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('password', 'Senha', ['class' => 'control-label']) !!}
                                {!! Form::password('password', ['class' => 'form-control', 'id' => 'password']) !!}
                            </div>
                            <button type="submit" class="btn btn-success btn-block">Entrar</button>
                        </fieldset>
                        {!! Form::close() !!}
                    </div>
                    <div class="panel-body">
                        
                        {!! Form::label('primeiro', 'Professor, caso este seja seu primeiro acesso, selecione seu nome abaixo para realizar o cadastro.', ['class' => 'control-label']) !!}
                        
                        {!! Form::select('professores', $professores, null, [
                            'placeholder' => 'Selecione...',
                            'class' => 'form-control',
                            'id' => 'selectProfessor',
                            'onchange' => 'location = \'/loginrapido/\'+this.value'
                        ]) !!}
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->
@endsection
