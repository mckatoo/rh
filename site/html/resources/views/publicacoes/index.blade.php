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
                        <i class="glyphicon glyphicon-education"></i> CADASTRO DE PROFESSOR - PUBLICAÇÕES
                    </div>
                </div>
                    @if (count($errors) > 0)
                       <div class="alert alert-danger">
                           <ul>
                               @foreach ($errors->all() as $error)
                                   <li class="list-unstyled">{{ $error }}</li>
                               @endforeach
                           </ul>
                       </div>
                    @endif
                    @if(session('success'))
                        <div class="alert alert-success" id="success">
                            {{ session('success') }}
                        </div>
                    @endif
                <div class="col-lg-12">
                    {!! Form::open(['route' => ['publicacoes.store'],'method'=>'POST','id'=>'frmProfessor']) !!}
                        @if(isset($id_prof))
                            {!! Form::hidden('id_prof', $id_prof, ['class' => 'form-control', 'id' => 'id_prof']) !!}
                        @endif
                        {!! Form::hidden('id_curso', null, ['id' => 'id_curso']) !!}
                        {!! Form::hidden('id', null, ['class' => 'form-control', 'id' => 'id']) !!}
                        <div class="form-group col-lg-12">
                            <div class="panel-red col-lg-12">
                                <div class="panel-heading">
                                    <i class="fa fa-warning fa-2x"></i><small> ATENÇÃO - O MATERIAL TEM QUE ESTAR PUBLICADO.</small>
                                </div>
                                <br>
                            </div>
                            <fieldset>
                                <legend>INFORME O TIPO DE PUBLICAÇÃO, UMA BREVE DESCRIÇÃO E A PUBLICAÇÃO EM PDF.</legend>

                                <div class="form-group col-lg-6">
                                    <fieldset>
                                        <legend>
                                            Qual o tipo desta publicação?
                                        </legend>
                                            {!! Form::select('tipo', $tipos, null, [
                                            'id' => 'selectTipos',
                                            'class' => 'form-control',
                                            'required' => 'required',
                                            'autofocus' => 'autofocus'
                                            ]) !!}
                                    </fieldset>
                                    <fieldset>
                                        <legend>
                                            Escolha os cursos relacionados a esta publicação.
                                        </legend>
                                        <div class="overflow checkbox-group">
                                            @foreach ($cursos as $curso)
                                                <div class="input-group">
                                                    {!! Form::label('curso', $curso->curso, ['class' => 'form-control auto-height']) !!}
                                                    <span class="input-group-addon">
                                                        {!! Form::checkbox('curso[]', $curso->id, false, [
                                                        'id' => 'checkCursos', 'class' => 'checkCursos checkCursos'.$curso->id
                                                        ]) !!}
                                                    </span>
                                                </div>
                                            @endforeach
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="form-group col-lg-6">
                                    <fieldset>
                                        <legend>
                                            Informe uma breve descrição sobre a publicação.
                                        </legend>
                                        {!! Form::textarea('descricao', null, [
                                        'maxlength' => '800',
                                        'rows' => '10',
                                        'class'=>'form-control input-meses',
                                        'id'=>'txtDescricao',
                                        'required'=>'required'
                                        ]) !!}
                                    </fieldset>
                                </div>
                                <div class="col-lg-12 text-center">
                                    <div class="col-lg-4 col-lg-offset-4">
                                        {!! Form::reset('Cancelar', ['id'=>'btnCancelar', 'class'=>'btn btn-default hidden cancelar']) !!}
                                        {!! Form::submit('Adicionar', ['id'=>'btnAdicionar', 'class'=>'btn btn-success btn-block']) !!}
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            
                                <div class="row">
                                    <div class="col-lg-12">
                                        <br>
                                        <table class="table table-bordered table-striped table-hover">
                                            @if ($pub->count()>0)
                                                <thead>
                                                    <tr>
                                                        <th class="middle text-center">Tipo</th>
                                                        <th class="middle">Descrição</th>
                                                        <th class="middle text-center">Cursos</th>
                                                        <th class="middle text-center">Arquivos</th>
                                                        <th class="middle text-center">Adicionado em</th>
                                                        <th class="middle text-center">Atualizado em</th>
                                                        <th colspan="2" class="middle tdbtn">Ações</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($pub as $p)
                                                        <tr>
                                                            <td class="middle text-center">{{ $p->tipo->tipo }}</td>
                                                            <td>
                                                                <div class="text-overflow">
                                                                    {{ $p->desc }}
                                                                </div>
                                                            </td>
                                                            <td class="middle tdbtn">
                                                                @foreach ($pub->find($p->id)->publicacao_curso()->get() as $pcurso)
                                                                    <div class="nowrap">
                                                                        {{ $pcurso->curso }}
                                                                    </div>
                                                                @endforeach
                                                            </td>
                                                            <td class="middle tdbtn">
                                                                <a name="btnListar"
                                                                class="btn btn-default"
                                                                data-toggle="modal"
                                                                data-target="#comprovantes"
                                                                id="btnLista"
                                                                onclick="$('#bind').load('{{ route('publicacoes.list_arq',$p->id) }}')">
                                                                    <i class="fa fa-plus-circle"></i>
                                                                </a>
                                                            </td>
                                                            <td class="middle text-center">{{ $p->created_at->format('d/m/Y H:i') }}</td>
                                                            <td class="middle text-center">{{ $p->updated_at->format('d/m/Y H:i') }}</td>
                                                            <td class="middle tdbtn">
                                                                <a href="#" class="btn btn-xs btn-primary" onclick="
                                                                preencheForm(
                                                                ['#id','#selectTipos','#txtDescricao'],
                                                                ['{{ $p->id }}','{{ $p->tipo->id }}','{{ str_replace('\n\n','\n',preg_replace("@[\n\r]@s",'\n',$p->desc)) }}']);
                                                                preencheCheckbox(
                                                                    '.checkCursos',
                                                                    {{ $p->publicacao_curso->lists('id') }}
                                                                );
                                                                ">Editar</a>
                                                            </td>
                                                            <td class="middle tdbtn">
                                                                <a class="btn btn-xs btn-danger" data-toggle="modal" href='#excluirPublicacao{{ $p->id }}'>Excluir</a>
                                                                <div class="modal fade" id="excluirPublicacao{{ $p->id }}">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <button type="button" class="close" data-dismiss="modalx" aria-hidden="true" onclick="fecharModal('#excluirPublicacao{{ $p->id }}{{ $p->id }}')">&times;</button>
                                                                                <h4 class="modal-title">Confirmação</h4>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <div class="panel-red col-lg-12">
                                                                                    <div class="panel-heading">
                                                                                        <i class="fa fa-warning fa-2x"></i>
                                                                                        Tem certesa que deseja excluir esta publicação?
                                                                                    </div>
                                                                                    <br>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-default" data-dismiss="modalx" onclick="fecharModal('#excluirPublicacao{{ $p->id }}')">Cancelar</button>
                                                                                <a href="#" class="btn btn-danger" 
                                                                                onclick="post('{{route('publicacoes.excluir')}}',
                                                                                {
                                                                                    _token: '{{csrf_token()}}',
                                                                                    id: '{{$p->id}}'
                                                                                });
                                                                                fecharModal('#excluirPublicacao{{ $p->id }}');
                                                                                ">Excluir</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            @endif
                                        </table>
                                    </div>
                                </div>
                            </fieldset>
                                <a class="btn btn-primary pull-left" href="{{ route('cursos.ministra') }}">VOLTAR</a>
                                @if ($pub->count() === 0)
                                    <a class="btn btn-primary pull-right disabled" href="{{ route('producoes.index') }}">PRÓXIMO</a>
                                @else
                                    <a class="btn btn-primary pull-right" href="{{ route('producoes.index') }}">PRÓXIMO</a>
                                @endif
                        </div>
                    <!-- Modal -->
                    <div class="modal fade" id="comprovantes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modalx" aria-label="Close" onclick="fecharModal('#comprovantes')"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Comprovantes</h4>
                                </div>
                                <div class="modal-body" id="bind"></div> {{-- Container da view list.blade.php - LISTA DE ARQUIVOS --}}
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
