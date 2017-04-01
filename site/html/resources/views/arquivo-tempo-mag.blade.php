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
                        <i class="glyphicon glyphicon-education"></i> CADASTRO DE PROFESSOR - UPLOAD DE COMPROVANTES
                    </div>
                </div>
                <div class="col-lg-12">
                    <form name=form role="form" method="post" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        @if(isset($id_tempo_mag))
                            <input type="hidden" name="id_tempo_mag" value={{$id_tempo_mag}}>
                        @endif
                        @if(isset($id_prof))
                            <input type="hidden" name="id_prof" value={{$id_prof}}>
                        @endif
                        @if(isset($arquivo->id))
                            <input type="hidden" name="id_arq" value={{$arquivo->id}}>
                        @endif
                        <div class="form-group col-lg-12">
                            <fieldset>
                                <legend>TEMPO NO MAGISTÉRIO, CURSO SUPERIOR OU EXPERIÊNCIA PROFISSIONAL NA EDUCAÇÃO.</legend>
                                <small>
                                    USE O BOTÃO ABAIXO PARA INSERIR OS DOCUMENTOS EM PDF QUE COMPROVAM O VALOR INFORMADO NA TELA ANTERIOR REFERENTE A TEMPO NO MAGISTÉRIO, CURSO SUPERIOR OU EXPERIÊNCIA PROFISSIONAL NA EDUCAÇÃO COMPROVADAS EM ANOS.
                                </small>
                                <br>
                                <br>
                                <span class="btn btn-success fileinput-button">
                                    <i class="glyphicon glyphicon-plus"></i>
                                    <span>Selecionar arquivos...</span>
                                    <input
                                        id="fileupload"
                                        type="file"
                                        name="documento"
                                        accept="application/pdf"
                                    >
                                </span>
                    </form>
                                <br>
                                <br>
                                <!-- The global progress bar -->
                                <div id="progress" class="progress">
                                    <div class="progress-bar progress-bar-success"></div>
                                </div>
                                @if(isset($success))
                                    <div class="alert alert-success" id="success">
                                        {{ $success }}
                                    </div>
                                @endif

                                @if((isset($tempo_mag->arquivos))and(count($tempo_mag->arquivos)>0))
                                    <br>
                                    <br>
                                    <table class="table table-bordered table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th class="middle">Nome</th>
                                                <th class="middle">Enviado em</th>
                                                <th colspan="2" class="middle text-center">Ações</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($tempo_mag->arquivos as $arquivo)
                                            <tr>
                                                <td class="middle">{!! $arquivo->arquivo !!}</td>
                                                <td class="middle">{!! $arquivo->created_at->format('d/m/Y H:i') !!}</td>
                                                <td class="middle tdbtn">
                                                    <input type="hidden" name="id_arq" value="{{$arquivo->id}}">
                                                    <a href="{!! route('tempo_mag.download', $arquivo->id) !!}" class="btn btn-xs btn-success">download</a>
                                                </td>
                                                <td class="middle tdbtn">
                                                    <a class="btn btn-xs btn-danger" data-toggle="modal" href='#modal{{ $arquivo->id }}'>Excluir</a>
                                                    <div class="modal fade" id="modal{{ $arquivo->id }}">
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
                                                                                        Tem certesa que deseja excluir o arquivo {{ $arquivo->arquivo }}?
                                                                                    </div>
                                                                                    <br>
                                                                                </div>
                                                                            </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                                    <a href="#" class="btn btn-danger" onclick="
                                                                        post(
                                                                            '{{ route('tempo_mag.excluir') }}',
                                                                            {
                                                                                _token: '{{ csrf_token() }}',
                                                                                id_arq: '{{ $arquivo->id }}',
                                                                                id_tempo_mag: '{{ $id_tempo_mag }}'
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
                                    </table>
                                @endif



                            </fieldset>
                            <a class="btn btn-primary pull-left" href="{{ route('prof.edit') }}">VOLTAR</a>
                            {{-- @if ($tempo_mag->arquivos->count() === 0) --}}
                                {{-- <a href="{{ route('tempo_exp.index') }}" class="btn btn-primary pull-right disabled">PRÓXIMO</a> --}}
                            {{-- @else --}}
                                <a href="{{ route('tempo_exp.index') }}" class="btn btn-primary pull-right">PRÓXIMO</a>
                            {{-- @endif --}}
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

    <!-- JQuery File Upload  -->
    <script src="{{ asset('js/vendor/jquery.ui.widget.js') }}"></script>
    <script src="{{ asset('js/jquery.iframe-transport.js') }}"></script>
    <script src="{{ asset('js/jquery.fileupload.js') }}"></script>
    <script src="{{ asset('js/milton.js') }}"></script>

    <script>
    ;(function($)
    {
        'use strict';
        $(document).ready(function()
        {
            var $fileupload = $('#fileupload');
            $fileupload.fileupload({
                url: "{{ route('tempo_mag.upload') }}",
                dataType: 'json',
                progressall: function (e, data) {
                    var progress = parseInt(data.loaded / data.total * 100, 10);
                    $('#progress .progress-bar').css(
                        'width',
                        progress + '%'
                    );
                },
                done: function (e, data) {
                },
                complete: function (e, data) {
                    location.reload();
                }
            });
        });
    })(window.jQuery);
    </script>
@endsection
