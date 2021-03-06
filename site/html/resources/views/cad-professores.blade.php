@extends($ext)

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
                </div>
                <form name=form role="form" class="form-k" action="{{ route('prof.store')}}" method="post" enctype="multipart/form-data">
                    <div class="col-lg-12">
                        {!! csrf_field() !!}
                        @if (isset($prof))
                        {!! Form::hidden('id', $prof->id) !!}
                        @endif
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
                     <div class="col-lg-6">
                        <label class="label-k">FOTO 3X4</label>
                        @if (isset($prof))
                        <img src="{{ route('prof.foto',Auth::id()) }}" alt="{{ $prof->nome }}" class="img-thumbnail foto3x4" data-toggle="tooltip" data-placement="right" title="{{ $prof->foto }}">
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
                            @if(Auth::check()))
                            value="{{ Auth::user()->name }}"
                            readonly="readonly"
                            @endif
                            required="required">
                        </div>
                        <div class="form-group-k col-lg-6">
                            <label class="label-k">
                                CPF <span>Somente números</span>
                            </label>
                            <input
                            class="form-control input-cpf"
                            type="text"
                            name="cpf"
                            
                            @if (isset($prof))
                            value="{{ $prof->cpf }}"
                            @endif
                            required="required"
                            autofocus>
                        </div>
                        <div class="form-group-k col-lg-6">
                            <label class="label-k">
                                NOME DA MÃE
                            </label>
                            <input
                            class="form-control input-mae"
                            type="text"
                            name="mae"
                            @if (isset($prof))
                            value="{{ $prof->mae }}"
                            @endif
                            required="required">
                        </div>
                        <div class="form-group-k col-lg-6">
                            <label class="label-k">
                                NOME DO PAI
                            </label>
                            <input
                            class="form-control input-pai"
                            type="text"
                            name="pai"
                            
                            @if (isset($prof))
                            value="{{ $prof->pai }}"
                            @endif

                            required="required">
                        </div>
                        <div class="form-group-k col-lg-6">
                            <label class="label-k">
                                ENDEREÇO
                            </label>
                            <input
                            class="form-control input-endereco"
                            type="text"
                            name="endereco"
                            
                            @if (isset($prof))
                            value="{{ $prof->endereco }}"
                            @endif
                            required="required">
                        </div>
                        <div class="form-group-k col-lg-6">
                            <label class="label-k">
                                E-MAIL
                            </label>
                            <input
                            class="form-control input-email"
                            type="email"
                            name="email"                            
                            value="{{ Auth::user()->email }}"
                            readonly="readonly"
                            required="required">
                        </div>
                        <div class="form-group-k col-lg-6">
                            <label class="label-k">
                                DATA DE ADMISSÃO
                            </label>
                            <input
                            class="form-control input-data"
                            type="text"
                            name="data_admissao"
                            
                            @if (isset($prof))
                            value="{{ date('d/m/Y', strtotime(str_replace('-', '/', $prof->data_admissao))) }}"
                            @endif
                            
                            required="required">
                        </div>
                        <div class="form-group-k col-lg-6">
                            <label class="label-k">
                                CARGA HORÁRIA SEMANAL ATUAL TOTAL EM TODOS OS CURSOS (Aula Teórica, Prática, PIM)
                            </label>
                            <input
                            class="form-control input-calc_total"
                            type="text"
                            name="ch_cursos_total"

                            @if (isset($prof))
                            value="{{ $prof->ch_cursos_total }}"
                            @endif
                            
                            required="required">
                        </div>
                        <div class="form-group-k col-lg-6">
                            <label class="label-k">
                                CARGA HORÁRIA DE COORDENAÇÃO
                            </label>
                            <input
                            class="form-control input-calc_compl"
                            type="text"
                            name="ch_atividade_compl"

                            @if (isset($prof))
                            value="{{ $prof->ch_atividade_compl }}"
                            @endif
                            
                            required="required">
                        </div>
                        <div class="form-group-k col-lg-6">
                            <label class="label-k">
                                NRO. ATUAL DE DISCIPLINAS DO DOCENTE
                            </label>
                            <input
                            class="form-control input-nro_discip"
                            type="text"
                            name="num_disciplinas"

                            @if (isset($prof))
                            value="{{ $prof->num_disciplinas }}"
                            @endif
                            
                            required="required">
                        </div>
                        <div class="form-group-k col-lg-6">
                            <label class="label-k">
                                TEMPO NO MAGISTÉRIO SUPERIOR COMPROVADO EM ANOS
                            </label>
                            <input
                            class="form-control input-tempo_mag"
                            type="text"
                            name="tempo_mag"

                            @if (isset($prof))
                            value="{{ $prof->tempomag()->first()->tempo }}"
                            @endif
                            
                            required="required">
                        </div>
                        <div class="form-group-k col-lg-6">
                            <label class="label-k">
                                TEMPO EXPERIÊNCIA PROFISSIONAL COMPROVADA (EM ANOS - FORA O MAGISTÉRIO)
                            </label>
                            <input
                            class="form-control input-tempo_fora_mag"
                            type="text"
                            name="tempo_exp"

                            @if (isset($prof))
                            value="{{ $prof->tempoexp()->first()->tempo }}"
                            @endif
                            
                            required="required">
                        </div>
                        <div class="panel-footer">
                            <button type="submit" class="btn btn-primary pull-right">PRÓXIMO</button>
                        </div>
                    </form>
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
    @endsection
