<div class="col-lg-12">
    {!! Form::open(['route' => ['titulos.store'], 'method' => 'POST']) !!}
        {!! Form::hidden('id_titulo', $id_titulo, ['class' => 'form-control']) !!}
        @if (isset($id_prof))
            {!! Form::hidden('id_prof', $id_prof, ['class' => 'form-control']) !!}
        @endif
        <div class="form-group col-lg-12">
            <fieldset>
                <legend>USE O BOTÃO ABAIXO PARA INSERIR OS COMPROVANTES EM PDF.</legend>
                <div class="panel">
                    <div class="form-group col-lg-12">
                        <br>
                        <br>
                        <span class="btn btn-success fileinput-button">
                            <i class="glyphicon glyphicon-plus"></i>
                            <span>Selecionar arquivos...</span>
                            {!! Form::file('documento', ['id' => 'fileupload','accept' => 'application/pdf']) !!}
                        </span>
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
                    </div>
                </div>
            </fieldset>
        </div>
    {!! Form::close() !!}
    <div id="bind"></div>
</div>

<script>
;(function($)
{
    'use strict';
    $(document).ready(function()
    {
        var $fileupload = $('#fileupload');
        $fileupload.fileupload({
            url: "{{ route('titulos.upload') }}",
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
                $("#bind").load("{!! route('titulos.list_arq',$id_titulo) !!}");
            }
        });
    });
})(window.jQuery);
$("#bind").load("{!! route('titulos.list_arq',$id_titulo) !!}");
</script>
