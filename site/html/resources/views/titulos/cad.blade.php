
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
                        <i class="glyphicon glyphicon-education"></i> CADASTRO DE PROFESSOR - TÍTULOS DO PROFESSOR
                    </div>
                </div>
                <div class="col-lg-12">
                    {!! Form::open(['route' => ['titulos.store'], 'method' => 'POST','id'=>'frmTitulos']) !!}
                       {{--  @if(isset($id_prof))
                            {!! Form::hidden('id_prof', $id_prof, ['id' => 'id_prof']) !!}
                        @endif --}}
                        {!! Form::hidden('id', null, ['id'=>'id']) !!}

                        @if (session('erro')!==null)
                            <div class="alert alert-danger">{{ session('erro') }}</div>
                        @endif
                        <div class="form-group col-lg-12">
                            <fieldset>
                                <legend>INFORME OS TÍTULOS QUE POSSUI.</legend>
                                    <div class="form-group col-lg-6">
                                        <fieldset>
                                            <legend>
                                                Escolha uma titulação para adicionar.
                                            </legend>
                                            {!! Form::select('titulo', [
                                                'GRADUAÇÃO' => 'GRADUAÇÃO',
                                                'ESPECIALIZAÇÃO' => 'ESPECIALIZAÇÃO',
                                                'MESTRADO' => 'MESTRADO',
                                                'DOUTORADO' => 'DOUTORADO',
                                            ], null, ['class' => 'form-control','id'=>'titulo','autofocus' => 'autofocus']) !!}
                                        </fieldset>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <fieldset>
                                            <legend>
                                                Curso - Informe o nome do curso correspondente a titulação escolhida.
                                            </legend>
                                            {!! Form::text('curso', null, ['class' => 'form-control input-curso','id'=>'curso','required' => 'required']) !!}
                                        </fieldset>
                                    </div>
                                    <div class="panel-heading col-lg-12">
                                        <a href="#" class="btn btn-default">Cancelar</a>
                                        <div class="pull-right">
                                            {!! Form::reset('Cancelar', ['id'=>'btnCancelar', 'class'=>'btn btn-default hidden cancelar']) !!}
                                            <input type="submit" id="btnAdicionar" class="btn btn-success btn-block" value="Adicionar" />
                                        </div>
                                    </div>
                                    {!! Form::close() !!}
                                @if(isset($success))
                                    <div class="alert alert-success" id="success">
                                        {{ $success }}
                                    </div>
                                @endif
                                @if((isset($titulos))and(count($titulos)>0))
                                    <br>
                                    <br>
                                    <table class="table table-bordered table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th class="middle">Titulo</th>
                                                <th class="middle">Curso</th>
                                                <th class="middle tdbtn text-center">Comprovante</th>
                                                <th class="middle">Adicionado em</th>
                                                <th colspan="2" class="middle tdbtn text-center">Ações</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($titulos as $tit)
                                            <tr>
                                                <td class="middle">{!! $tit->titulo !!}</td>
                                                <td class="middle">{!! $tit->curso !!}</td>
                                                <td class="middle tdbtn">
                                                    <a name="btnListar"
                                                    class="btn btn-default"
                                                    data-toggle="modal"
                                                    data-target="#comprovantes"
                                                    id="btnLista"
                                                    onclick="$('#arquivos').load('{!! route('titulos.cad_arq',$tit->id) !!}');">
                                                        <i class="fa fa-plus-circle"></i>
                                                    </a>
                                                </a>
                                                </td>
                                                <td class="middle">{!! $tit->created_at->format('d/m/Y H:i') !!}</td>
                                                <td class="middle tdbtn">
                                                    <a href="#" class="btn btn-xs btn-primary" onclick="
                                                    preencheForm(
                                                    ['#id','#titulo','#curso'],
                                                    ['{{ $tit->id }}','{{ $tit->titulo }}','{{ $tit->curso }}'])
                                                    ">Editar</a>
                                                </td>
                                               {{--  <td class="tdbtn middle">
                                                    <a href="#" class="btn btn-xs btn-primary" onclick="editarTitulo(
                                                    '{{ route('titulos.update') }}',
                                                    ['{{ $tit->id }}',
                                                    '{{ $tit->titulo }}',
                                                    '{{ $tit->curso }}']
                                                    )">Editar</a>
                                                </td> --}}
                                                <td class="middle tdbtn">
                                                    <a class="btn btn-xs btn-danger" data-toggle="modal" href='#modal{{ $tit->id }}'>Excluir</a>
                                                    <div class="modal fade" id="modal{{ $tit->id }}">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modalx" onclick="fecharModal('#modal{{ $tit->id }}')" aria-hidden="true">&times;</button>
                                                                    <h4 class="modal-title">Confirmação</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="panel-red col-lg-12">
                                                                        <div class="panel-heading">
                                                                            <i class="fa fa-warning fa-2x"></i>
                                                                            Tem certesa que deseja excluir o titulo {{ $tit->titulo }} e o curso correspondente {{ $tit->curso }}?
                                                                        </div>
                                                                        <br>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-default" data-dismiss="modalx" onclick="fecharModal('#modal{{ $tit->id }}')">Cancelar</button>
                                                                    <a href="#" class="btn btn-danger" onclick="
                                                                    post(
                                                                    '{{ route('titulos.destroy') }}',
                                                                    {
                                                                        _token: '{{ csrf_token() }}',
                                                                        id: '{{ $tit->id }}'
                                                                    })">Excluir
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
                            <a class="btn btn-primary pull-left" href="{{ route('telefone_prof.index') }}">VOLTAR</a>
                            <a href="{{ route('cursos.ministra') }}" class="btn btn-primary{{$disable}} pull-right">PRÓXIMO</a>
                        </div>
                    <!-- Modal -->
                    <div class="modal fade" id="comprovantes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modalx" aria-label="Close"><span aria-hidden="true" onclick="fecharModal('#comprovantes')">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Comprovantes</h4>
                                </div>
                                <div class="modal-body"></div>
                                <div id="arquivos"></div> {{-- Container da view cad_arq.blade.php - 2º TELA --}}
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modalx" onclick="fecharModal('#comprovantes')">Sair</button>
                                </div>
                            </div>
                        </div>
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
    <!-- JQuery File Upload  -->
    <script src="{{ asset('js/vendor/jquery.ui.widget.js') }}"></script>
    <script src="{{ asset('js/jquery.iframe-transport.js') }}"></script>
    <script src="{{ asset('js/jquery.fileupload.js') }}"></script>
@endsection
