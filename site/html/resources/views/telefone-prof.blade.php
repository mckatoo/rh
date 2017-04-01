
@extends($ext)

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

    <!-- Custom Fonts -->
    <link href="{{ asset('/bower_components/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

    <!-- JQuery File Upload -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- blueimp Gallery styles -->
    <link rel="stylesheet" href="//blueimp.github.io/Gallery/css/blueimp-gallery.min.css">

    <!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
    <link rel="stylesheet" href="{{ asset('css/jquery.fileupload.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.fileupload-ui.css') }}">

    <!-- CSS adjustments for browsers with JavaScript disabled -->
    <noscript><link rel="stylesheet" href="{{ asset('css/jquery.fileupload-noscript.css') }}"></noscript>
    <noscript><link rel="stylesheet" href="{{ asset('css/jquery.fileupload-ui-noscript.css') }}"></noscript>

    <link rel="stylesheet" href="{{ asset('css/iesi.css') }}">
@endsection

@section('menu')
    @include('paginas.mini-menu')
@stop

@section('content')
    <div {{$div}}>
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
                        <i class="glyphicon glyphicon-education"></i> CADASTRO DE PROFESSOR - TELEFONES
                    </div>
                </div>
                <div class="col-lg-12">
                    <form name=form role="form" action="{{route('telefone_prof.store')}}" method="post" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        @if(isset($id_prof))
                            {!! Form::hidden('id_prof', $id_prof, ['class' => 'form-control', 'id' => 'id_prof']) !!}
                        @endif
                        <div class="form-group col-lg-12">
                            <fieldset>
                                <legend>INSIRA QUANTOS TELEFONES QUISER, CELULAR OU FIXO.</legend>
                                <div class="panel">
                                    <div class="input-group">
                                        <input
                                            type="text"
                                            class="form-control input-telefone"
                                            name="telefone"
                                            required="required"
                                            autofocus
                                            placeholder="Digite somente números..."/>
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="submit"><i class="fa fa-plus-circle"></i></button>
                                        </span>
                                    </div>
                                </div>
                            </form>
                                @if(isset($success))
                                    <div class="alert alert-success" id="success">
                                        {{ $success }}
                                    </div>
                                @endif
                                @if((isset($telefones))and(count($telefones)>0))
                                    <br>
                                    <br>
                                    <table class="table table-bordered table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>Telefone</th>
                                                <th>Adicionado em</th>
                                                <th class="text-center">Ações</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($telefones as $tel)
                                            <tr>
                                                <td>{!! $tel->telefone !!}</td>
                                                <td>{!! $tel->created_at->format('d/m/Y H:i') !!}</td>
                                                <td class="middle tdbtn">
                                                    <a class="btn btn-xs btn-danger" data-toggle="modal" href='#modal{{ $tel->id }}'>Excluir</a>
                                                    <div class="modal fade" id="modal{{ $tel->id }}">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                                <button type="button" class="close" data-dismiss="modalx" aria-hidden="true">&times;</button>
                                                                                <h4 class="modal-title">Confirmação</h4>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <div class="panel-red col-lg-12">
                                                                                    <div class="panel-heading">
                                                                                        <i class="fa fa-warning fa-2x"></i>
                                                                                        Tem certesa que deseja excluir o telefone {{ $tel->telefone }}?
                                                                                    </div>
                                                                                    <br>
                                                                                </div>
                                                                            </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                                    <a href="#" class="btn btn-danger" onclick="
                                                                    post('{{ route('telefone_prof.destroy') }}',
                                                                    {
                                                                        _token: '{{ csrf_token() }}',
                                                                        id: '{{ $tel->id }}'
                                                                    }
                                                                    )">Excluir
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @endif

                            </fieldset>
                            <a class="btn btn-primary pull-left" href="{{ route('tempo_exp.index') }}">VOLTAR</a>
                            <a href="{{ route('titulos.index') }}" class="btn btn-primary{{ $disable }} pull-right">PRÓXIMO</a>
                        </div>
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
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

    <!-- Meus Scripts -->
    <script src="{{ asset('js/jquery.mask.min.js') }}"></script>
    <script src="{{ asset('js/milton-mask.js') }}"></script>
    <script src="{{ asset('js/milton.js') }}"></script>
@endsection
