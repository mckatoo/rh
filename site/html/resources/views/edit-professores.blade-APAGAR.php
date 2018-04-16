@extends($ext)

@section('linkcss')
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('/bower_components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">

    <!-- MetisMenu CSS -->
    <link href="{{ asset('/bower_components/metisMenu/dist/metisMenu.min.css') }}" rel="stylesheet" type="text/css">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Custom CSS -->
    <link href="{{ asset('/dist/css/sb-admin-2.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/css/iesi.css') }}" rel="stylesheet" type="text/css">

    <!-- Custom Fonts -->
    <link href="{{ asset('/bower_components/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
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
                        <i class="glyphicon glyphicon-education"></i> CADASTRO DE PROFESSOR
                    </div>
                        <form name="frmCadastroProfessor" role="form" class="form-k" id="frmCadastroProfessor" action="{{ route('prof.update')}}" method="post" enctype="multipart/form-data">
                            {!! csrf_field() !!}
                            <div class="col-lg-12">
                                @if(session('erro'))
                                    <div class="alert alert-danger">
                                        {{session('erro')}}
                                    </div>
                                @endif
                                <div class="col-lg-6">
                                    <label class="label-k">FOTO 3X4</label>
                                    @if (($prof->foto !== "")and($prof->foto !== null))
                                        <img src="{{ route('prof.foto',$prof->id) }}" alt="{{ $prof->nome }}" class="img-thumbnail foto3x4" data-toggle="tooltip" data-placement="right" title="{{ $prof->foto }}">
                                    @endif
                                    {!! Form::file('foto',[
                                        'class'         =>'form-control',
                                        'accept'        =>'image/*',
                                        'autofocus'     =>'autofocus',
                                        'data-max-size' =>'100'
                                    ]) !!}
                                </div>
                            </div>
                    <div class="col-lg-12">
                            <div class="form-group-k col-lg-6">
                                <label class="label-k">NOME COMPLETO</label>
                                <input
                                class="form-control input-nome"
                                type="text"
                                name="nome"
                                value="{{$prof->nome}}"
                                required="required">
                            </div>
                            <div class="form-group-k col-lg-6">
                                <label class="label-k">CPF</label>
                                <input
                                class="form-control input-cpf"
                                type="text"
                                name="cpf"
                                value="{{$prof->cpf}}"
                                required="required">
                            </div>
                            <div class="form-group-k col-lg-6">
                                <label class="label-k">NOME DA MÃE</label>
                                <input
                                class="form-control input-mae"
                                type="text"
                                name="mae"
                                value="{{$prof->mae}}"
                                required="required">
                            </div>
                            <div class="form-group-k col-lg-6">
                                <label class="label-k">NOME DO PAI</label>
                                <input
                                class="form-control input-pai"
                                type="text"
                                name="pai"
                                value="{{$prof->pai}}"
                                required="required">
                            </div>
                            <div class="form-group-k col-lg-6">
                                <label class="label-k">ENDEREÇO</label>
                                <input
                                class="form-control input-endereco"
                                type="text"
                                name="endereco"
                                value="{{$prof->endereco}}"
                                required="required">
                            </div>
                            <div class="form-group-k col-lg-6">
                                <label class="label-k">E-MAIL</label>
                                <input
                                class="form-control input-email"
                                type="email"
                                name="email"
                                value="{{$prof->email}}"
                                required="required">
                            </div>
                            <div class="form-group-k col-lg-6">
                                <label class="label-k">DATA DE ADMISSÃO</label>
                                <input
                                class="form-control input-data"
                                type="text"
                                name="data_admissao"
                                value="{{ date('d/m/Y', strtotime(str_replace('-', '/', $prof->data_admissao))) }}"
                                required="required">
                            </div>
                            <div class="form-group-k col-lg-6">
                                <label class="label-k">CARGA HORÁRIA SEMANAL ATUAL TOTAL EM TODOS OS CURSOS (Aula Teórica, Prática, PIM)</label>
                                <input
                                class="form-control input-calc_total"
                                type="text"
                                name="ch_cursos_total"
                                value="{{$prof->ch_cursos_total}}"
                                required="required">
                            </div>
                            <div class="form-group-k col-lg-6">
                                <label class="label-k">CARGA HORÁRIA DE COORDENAÇÃO</label>
                                <input
                                class="form-control input-calc_compl"
                                type="text"
                                name="ch_atividade_compl"
                                value="{{$prof->ch_atividade_compl}}"
                                required="required">
                            </div>
                            <div class="form-group-k col-lg-6">
                                <label class="label-k">NRO. ATUAL DE DISCIPLINAS DO DOCENTE</label>
                                <input
                                class="form-control input-nro_discip"
                                type="text"
                                name="num_disciplinas"
                                value="{{$prof->num_disciplinas}}"
                                required="required">
                            </div>
                            <div class="form-group-k col-lg-6">
                                <label class="label-k">TEMPO NO MAGISTÉRIO SUPERIOR COMPROVADO EM ANOS</label>
                                <input
                                class="form-control input-tempo_mag"
                                type="text"
                                name="tempo_mag_sup_exp_pro_id"
                                value="{{$tempo_mag->tempo}}"
                                required="required">
                            </div>
                            <div class="form-group-k col-lg-6">
                                <label class="label-k">TEMPO EXPERIÊNCIA PROFISSIONAL COMPROVADA (EM ANOS - FORA O MAGISTÉRIO)</label>
                                <input
                                class="form-control input-tempo_fora_mag"
                                type="text"
                                name="tempo_exp_pro_fora_mag_id"
                                value="{{$tempo_exp->tempo}}"
                                required="required">
                            </div>

                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-primary pull-right">PRÓXIMO</button>
                            </div>
                        </form>
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
