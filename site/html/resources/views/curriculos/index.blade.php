@extends('admin')

@section('linkcss')
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
    <link href="{{ asset('/css/iesi.css') }}" rel="stylesheet">

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
                <div class="alert alert-danger">{{ sessino('erro') }}</div>
            @endif
            @if (isset($professores))
                <div class="form-group col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="glyphicon glyphicon-education"></i> Curriculos de Professores
                        </div>
                        <div class="panel-body">
                        {!! Form::open(['route' => 'curriculos.professor', 'method' => 'POST']) !!}
                            <fieldset>
                                <legend>Por Professor</legend>
                                {!! Form::select('professor',$professores,null,[
                                'class' => 'form-control',
                                'id' => 'selectProfessor',
                                'placeholder' => 'TODOS',
                                'autofocus' => 'autofocus'
                                ]) !!}
                                <br>
                                {!! Form::submit('Emitir', ['class'=>'btn btn-button btn-success btn-block']) !!}
                                {!! Form::close() !!}
                            </fieldset>
                        </div>
                    </div>
                </div>
            @endif
        </div> <!-- /.row -->
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
       setInterval(function () {
            $('.alert').addClass('hidden');
        }, 6000);
    </script>

@endsection
