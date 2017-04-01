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
                        <i class="glyphicon glyphicon-education"></i> CADASTRO DE PROFESSOR - CURSOS
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
                    {!! Form::open(['route' => ['cursos.addprofessor'],'method'=>'POST','id'=>'frmProfessor']) !!}
                        {{-- {!! Form::hidden('id_curso', null, ['id' => 'id_curso']) !!} --}}
                        {!! Form::hidden('id', null, ['class' => 'form-control', 'id' => 'id']) !!}
                        <div class="form-group col-lg-12">
                            <fieldset>
                                <legend>INFORME OS CURSOS EM QUE MINISTRA AULAS ATUALMENTE.</legend>
                                    <div class="form-group col-lg-6">
                                        <fieldset>
                                            <legend>
                                                Escolha um curso para adicionar.
                                            </legend>
                                            {!! Form::select('curso',$cursos,null,[
                                            'class' => 'form-control select-cursos',
                                            'id' => 'selectCursos',
                                            'placeholder' => 'Selecione',
                                            'required' => 'required',
                                            'autofocus' => 'autofocus'
                                            ]) !!}
                                        </fieldset>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <fieldset>
                                            <legend>
                                                Tempo de vínculo com o curso initerrupto EM MESES.
                                            </legend>
                                            {!! Form::number('tempo', null, [
                                            'class'=>'form-control input-meses',
                                            'id'=>'txtTempo',
                                            'required'=>'required'
                                            ]) !!}
                                        </fieldset>
                                    </div>
                                    <div class="panel-heading col-lg-12">
                                        <div class="pull-right">
                                            {!! Form::reset('Cancelar', ['id'=>'btnCancelar', 'class'=>'btn btn-default hidden cancelar']) !!}
                                            <input value="Adicionar" type="submit" id="btnProfessor" class="btn btn-success btn-block" />
                                        </div>
                                    </div>
                                    {!! Form::close() !!}
                                
                                    <br>
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="box-title">
                                                <h3 class="title panel-title">Cursos que ministra aula atualmente.</h3>
                                            </div>
                                            <table class="table table-bordered table-striped table-hover">
                                                <thead>
                                                    <tr>
                                                        <th class="middle">Curso</th>
                                                        <th class="middle" class="tdbtn">Tempo em Meses</th>
                                                        <th class="middle">Adicionado em</th>
                                                        <th colspan="2" class="middle tdbtn">Ações</th>
                                                    </tr>
                                                </thead>
                                                @if ($professor->count()>0)
                                                    <tbody>
                                                        @foreach ($professor as $p)
                                                            <tr>
                                                                <td class="middle">{{ $p->curso }}</td>
                                                                <td class="middle">{{ $p->pivot->tempo_meses }}</td>
                                                                <td class="middle">{{ $p->pivot->created_at->format('d/m/Y H:i') }}</td>
                                                                <td class="middle tdbtn">
                                                                    <a href="#" class="btn btn-xs btn-primary" onclick="
                                                                    preencheForm(
                                                                    ['#id','#selectCursos','#txtTempo'],
                                                                    ['{{ $p->pivot->id }}','{{ $p->pivot->cursos_id }}','{{ $p->pivot->tempo_meses }}'])
                                                                    ">Editar</a>
                                                                </td>
                                                                <td class="middle tdbtn">
                                                                    <a class="btn btn-xs btn-danger" data-toggle="modal" href='#curso{{ $p->pivot->cursos_id }}'>Excluir</a>
                                                                    <div class="modal fade" id="curso{{ $p->pivot->cursos_id }}" data-backdrop="true">
                                                                        <div class="modal-dialog">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <button type="button" class="close" data-dismiss="modalx" aria-hidden="true" onclick="fecharModal('#curso{{ $p->pivot->cursos_id }}')">&times;</button>
                                                                                    <h4 class="modal-title">Confirmação</h4>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <div class="panel-red col-lg-12">
                                                                                        <div class="panel-heading">
                                                                                            <i class="fa fa-warning fa-2x"></i>
                                                                                            Ao excluir o curso {{ $p->curso }}, ele será transportado para a tabela de Cursos que já ministrou aula.<br>
                                                                                            Tem certeza que deseja excluir?
                                                                                        </div>
                                                                                        <br>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-default" data-dismiss="modalx" onclick="fecharModal('#curso{{ $p->pivot->cursos_id }}')">Cancelar</button>
                                                                                    <a href="#" class="btn btn-danger" onclick="
                                                                                    post('{{route('cursos.rmprofessor')}}',
                                                                                    {
                                                                                        _token: '{{ csrf_token() }}',
                                                                                        idcurso: '{{ $p->pivot->cursos_id }}',
                                                                                        tempo: '{{ $p->pivot->tempo_meses }}'
                                                                                    }
                                                                                    )">Excluir</a>
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


                                        <div class="col-lg-6">
                                            <div class="box-title">
                                                <h3 class="title panel-title">Cursos que já ministrou aula.</h3>
                                            </div>
                                            <table class="table table-bordered table-striped table-hover">
                                                <thead>
                                                    <tr>
                                                        <th class="middle">Curso</th>
                                                        <th class="middle" class="tdbtn">Tempo em Meses</th>
                                                        <th class="middle">Adicionado em</th>
                                                        @if (Auth::user()->tipo->tipo == 'Administrador')
                                                        <th class="middle tdbtn">Ações</th>
                                                        @endif
                                                    </tr>
                                                </thead>
                                                @if ($jaministrou->count()>0)
                                                    <tbody>
                                                        @foreach ($jaministrou as $j)
                                                            <tr>
                                                                <td class="middle">{{ $j->curso }}</td>
                                                                <td class="middle">{{ $j->pivot->tempo_meses }}</td>
                                                                <td class="middle">{{ $j->pivot->created_at->format('d/m/Y H:i') }}</td>
                                                                @if (Auth::user()->tipo->tipo == 'Administrador')
                                                                <td class="middle tdbtn">
                                                                    {!! Form::open(['route'=>['cursos.rmjaministrou'],'method'=>'POST','id'=>'frmj'.$j->pivot->id]) !!}
                                                                    {!! Form::hidden('idcurso', $j->pivot->cursos_id) !!}
                                                                    {!! Form::hidden('tempo', $j->pivot->tempo_meses) !!}
                                                                    {!! Form::submit('Excluir', ['class'=>'btn btn-xs btn-danger']) !!}
                                                                    {!! Form::close() !!}
                                                                </td>
                                                                @endif
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                @endif
                                            </table>
                                        </div>
                                    </div>
                            </fieldset>
                                <a class="btn btn-primary pull-left" href="{{ route('titulos.index') }}">VOLTAR</a>
                                @if (($professor->count() === 0) and ($jaministrou->count() === 0))
                                    <a class="btn btn-primary pull-right disabled" href="{{ route('publicacoes.index') }}">PRÓXIMO</a>
                                @else
                                    <a class="btn btn-primary pull-right" href="{{ route('publicacoes.index') }}">PRÓXIMO</a>
                                @endif
                        </div>
                    <!-- Modal -->
                    <div class="modal fade" id="comprovantes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Comprovantes</h4>
                                </div>
                                <div class="modal-body"></div>
                                <div id="arquivos"></div> {{-- Container da view cad_arq.blade.php - 2º TELA --}}
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Sair</button>
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
