<div class="form-group col-lg-12">
    <fieldset>
        <legend>USE O BOTÃO ABAIXO PARA ADICIONAR ARQUIVO EM PDF QUE COMPROVA A PRODUÇÃO.</legend>
        <span class="btn btn-success fileinput-button">
            <i class="glyphicon glyphicon-plus"></i>
            <span>Selecionar arquivos...</span>
            {!! Form::file('documento', ['id'=>'fileupload','accept'=>'application/pdf']) !!}
            {!! Form::hidden('idProducao', null, ['id'=>'idProducao']) !!}
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
    </fieldset>
</div>

@if (session('erro')!==null)
    <div class="alert alert-danger">{{ session('erro') }}</div>
@endif
@if((isset($arq))and(count($arq)>0))
    <br>
    <br>
    <table class="table table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th class="middle">Nome</th>
                <th class="middle">Adicionado em</th>
                <th class="middle tdbtn">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($arq as $arquivo)
            <tr>
                <td class="middle"><a href="{{ route('producoes.download',[$arquivo->id]) }}">{{ $arquivo->arquivo }}</a></td>
                <td class="middle"> {{ $arquivo->created_at->format('d/m/Y H:i') }} </td>
                <td class="text-center">
                    <a class="btn btn-xs btn-danger" data-toggle="modal" href='#excluir{{ $arquivo->id }}'>Excluir</a>
                    <div class="modal fade" id="excluir{{ $arquivo->id }}" data-backdrop="false">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modalx" aria-hidden="true" onclick="fecharModal('#excluir{{ $arquivo->id }}')">&times;</button>
                                    <h4 class="modal-title red">Confirmação</h4>
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
                                    <button type="button" class="btn btn-default" data-dismiss="modalx" onclick="fecharModal('#excluir{{ $arquivo->id }}')">Cancelar</button>
                                    <a href="#" class="btn btn-danger" onclick="
                                    post('{{route('producoes.excluir_arq')}}',
                                    {
                                        _token: '{{csrf_token()}}',
                                        idArq: '{{$arquivo->id}}',
                                        idProducao: '{{$arquivo->producao_id}}'
                                    },
                                    '{{ route('producoes.list_arq',$idProducao) }}');
                                     fecharModal('#excluir{{ $arquivo->id }}');">Excluir</a>
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

<script>
;(function($)
{
    'use strict';
    $(document).ready(function()
    {
        var $fileupload = $('#fileupload');
        $fileupload.fileupload({
            url: "{{ route('producoes.upload') }}",
            formData: {_token: "{{ csrf_token() }}", idProducao: "{{ $idProducao }}"},
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
                $("#bind").load("{{ route('producoes.list_arq',$idProducao) }}");
            }
        });
    });
})(window.jQuery);
</script>
