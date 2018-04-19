@extends('print')

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

    @section('menu')
    @include('paginas.mini-menu')
    @stop

    @section('content')
    @if (Auth::user()->tipo->tipo == "Administrador")
    <div id="page-wrapper">
        @endif
        @if (Auth::user()->tipo->tipo == "Professor")
        <div class="container">
            @endif
            @if (session('erro')!==null)
            <div class="alert alert-danger">{{ session('erro') }}</div>
            @endif
            <div class="row nao-imprimir">
                <div class="col-lg-12">
                    <h1 class="page-header">Curriculo</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            @foreach ($professores as $prof)
            <div class="relatorio">
                <!-- /.row -->
                <div class="row">
                    <div class="panel panel-default">
                        <div class="panel-heading relatorio-titulo">
                            <h4><b>Professor {{ $prof->nome }}</b> <br> <small class="text-muted">Dados Pessoais</small></h4>
                        </div>
                        <div class="panel-body">
                            <div class="col-lg-12">
                                <table class="table table-hover">
                                    <tbody>
                                        <tr>
                                            <td rowspan="4" class="col-xs-2">
                                                @if (($prof->foto !== "") and ($prof->foto !== null))
                                                <img src="{{ route('prof.foto',$prof->users_id) }}" alt="{{ $prof->nome }}" class="img-thumbnail foto3x4" data-toggle="tooltip" data-placement="right" title="{{ $prof->foto }}">
                                                @endif
                                            </td>
                                            <td class="active col-xs-2"><b>CPF</b></td>
                                            <td class="col-xs-10">{{ $prof->cpf }}</td>
                                        </tr>
                                        <tr>
                                            <td class="active col-xs-2"><b>Endereço</b></td>
                                            <td class="col-xs-10">{{ $prof->endereco }}</td>
                                        </tr>
                                        <tr>
                                            <td class="active col-xs-2"><b>E-Mail</b></td>
                                            <td class="col-xs-10">{{ $email }}</td>
                                        </tr>
                                        <tr>
                                            <td class="active col-xs-2"><b>Data de Adminissão</b></td>
                                            <td class="col-xs-10">{{ $prof->data_admissao->format('d/m/Y') }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <tbody>
                                            <tr>
                                                <td class="active col-xs-4"><b>Nome do Pai</b></td>
                                                <td class="col-xs-8">{{ $prof->pai }}</td>
                                            </tr>
                                            <tr>
                                                <td class="active col-xs-4"><b>Nome da Mãe</b></td>
                                                <td class="col-xs-8">{{ $prof->mae }}</td>
                                            </tr>
                                            <tr>
                                                <td class="active col-xs-4" rowspan="{{ $prof->telefones->count() }}"><b>Telefones</b></td>
                                                <td class="col-xs-4">
                                                    @foreach ($prof->telefones->all() as $tel)
                                                    {{ $tel->telefone }}<br>
                                                    @endforeach
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>CARGA HORÁRIA E EXPERIÊNCIA</h4>
                        </div>
                        <div class="panel-body">
                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <tbody>
                                            <tr>
                                                <td class="active col-xs-9 wrap"><b>CARGA HORÁRIA SEMANAL ATUAL TOTAL EM TODOS OS CURSOS (Aula Teórica, Prática, PIM)</b></td>
                                                <td class="col-xs-3">{{ $prof->ch_cursos_total }} HORAS</td>
                                            </tr>
                                            <tr>
                                                <td class="active col-xs-9 wrap"><b>CARGA HORÁRIA DE COORDENAÇÃO</b></td>
                                                <td class="col-xs-3">{{ $prof->ch_atividade_compl }} HORAS</td>
                                            </tr>
                                            <tr>
                                                <td class="active col-xs-9 wrap"><b>NRO. ATUAL DE DISCIPLINAS DO DOCENTE</b></td>
                                                <td class="col-xs-3">{{ $prof->num_disciplinas }}</td>
                                            </tr>
                                            <tr>
                                                <td class="active col-xs-9 wrap"><b>TEMPO NO MAGISTÉRIO SUPERIOR COMPROVADO EM ANOS</b></td>
                                                <td class="col-xs-3">{{ $prof->tempomag->tempo }} ANOS</td>
                                            </tr>
                                            <tr>
                                                <td class="active col-xs-9 wrap"><b>TEMPO EXPERIÊNCIA PROFISSIONAL COMPROVADA (EM ANOS - FORA O MAGISTÉRIO)</b></td>
                                                <td class="col-xs-3">{{ $prof->tempoexp->tempo }} ANOS</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>TITULAÇÃO</h4>
                        </div>
                        <div class="panel-body">
                            <div class="col-lg-12">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr class="active">
                                                        <th class="col-lg-3">TÍTULO</th>
                                                        <th class="col-lg-3">CURSO</th>
                                                        <th class="col-lg-3">CONCLUSÃO</th>
                                                        <th class="col-lg-3">FACULDADE/INSTITUICÃO</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($prof->titulos->all('orderBy','peso') as $tit)
                                                    <tr
                                                    class="pointer"
                                                    data-toggle="modal"
                                                    data-target="#comprovantes"
                                                    onclick="$('#bind').load('{!! route('curriculos.arq_titulo',$tit->id) !!}');">
                                                        <td class="col-lg-3">{{ $tit->titulo }}</td>
                                                        <td class="col-lg-3">{{ $tit->curso }}</td>
                                                        <td class="col-lg-3">{{ $tit->ano_conclusao }}</td>
                                                        <td class="col-lg-3">{{ $tit->instituicao }}</td>
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
                </div>
                <div class="row">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>CURSOS</h4>
                        </div>
                        <div class="panel-body">
                            <div class="col-lg-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <b>CURSOS QUE MINISTRA AULA ATUALMENTE.</b>
                                    </div>
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th class="col-xs-9 active wrap">CURSO</th>
                                                        <th class="col-xs-3">MESES</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($prof->cursos->all() as $cursos)
                                                    <tr>
                                                        <td class="col-xs-9 active wrap">{{ $cursos->curso }}</td>
                                                        <td class="col-xs-3">{{ $cursos->pivot->tempo_meses }}</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <b>CURSOS QUE JÁ MINISTROU AULA.</b>
                                    </div>
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th class="col-xs-9 active wrap">CURSO</th>
                                                        <th class="col-xs-3">MESES</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($prof->ja_ministrou->all() as $ja_ministrou)
                                                    <tr>
                                                        <td class="col-xs-9 active wrap">{{ $ja_ministrou->curso }}</td>
                                                        <td class="col-xs-3">{{ $ja_ministrou->pivot->tempo_meses }}</td>
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
                </div>
                <div class="row">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>PUBLICAÇÕES</h4>
                        </div>
                        <div class="panel-body">
                            @foreach ($publicacao as $pub)
                            <div class="col-lg-12">
                                <div
                                class="panel panel-default pointer"
                                data-toggle="modal"
                                data-target="#comprovantes"
                                onclick="$('#bind').load('{!! route('curriculos.arq_publicacao',$pub->id) !!}');">
                                    <div class="panel-heading">
                                        <b>{{ $pub->tipo->tipo }}</b> <br>
                                    </div>
                                    <div class="panel-body">
                                        <div class="col-lg-12">
                                            <b>Cursos relacionados a esta publicação:</b>
                                                @foreach($pub->publicacao_curso->all() as $i => $pcurso)
                                                    @if($i == count($pub->publicacao_curso) - 1)
                                                        {{ $pcurso->curso }}
                                                    @else
                                                        {{ $pcurso->curso." - " }}
                                                    @endif
                                                @endforeach
                                                <div class="panel">
                                                    <b>Descrição: </b>
                                                    <small class="text-muted">
                                                        {{ $pub->desc }}
                                                    </small>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>PRODUÇÕES</h4>
                        </div>
                        <div class="panel-body">
                            @foreach ($producao as $prod)
                            <div class="col-lg-12">
                                <div
                                class="panel panel-default pointer"
                                data-toggle="modal"
                                data-target="#comprovantes"
                                onclick="$('#bind').load('{!! route('curriculos.arq_producao',$prod->id) !!}');">
                                    <div class="panel-heading">
                                        <b>{{ $prod->tipo->tipo }} </b><br>
                                    </div>
                                    <div class="panel-body">
                                        <div class="col-lg-12">
                                        <b>Cursos relacionados a esta produção:</b>
                                            @foreach($prod->producao_curso->all() as $i => $pcurso)
                                                @if($i == count($prod->producao_curso) - 1)
                                                    {{ $pcurso->curso }}
                                                @else
                                                    {{ $pcurso->curso." - " }}
                                                @endif
                                            @endforeach
                                            <div class="panel">
                                                    <b>Descrição: </b>
                                                    <small class="text-muted">
                                                        {{ $prod->desc }}
                                                    </small>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            <!-- Modal -->
                    <div class="modal fade" id="comprovantes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modalx" aria-label="Close"><span aria-hidden="true" onclick="fecharModal('#comprovantes')">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Comprovantes</h4>
                                </div>
                                <div class="modal-body">
                                    <div id="bind"></div> {{-- Container da view cad_arq.blade.php - 2º TELA --}}
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modalx" onclick="fecharModal('#comprovantes')">Sair</button>
                                </div>
                            </div>
                        </div>
                    </div>


            <div class="rodape nao-imprimir text-center">
                <a href="javascript:window.print()" class="btn btn-primary"><i class="fa fa-print fa-2x"></i>
                    <div class="text-center">
                        <b> IMPRIMIR</b>
                    </div>
                </a>
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
           setInterval(function () {
            $('.alert').addClass('hidden');
        }, 6000);
    </script>

    @endsection