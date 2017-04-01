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
                <td class="middle"><a href="{!! route('titulos.download',[$arquivo->id]) !!}">{!! $arquivo->arquivo !!}</a></td>
                <td class="middle">{!! $arquivo->created_at->format('d/m/Y H:i') !!}</td>
                <td class="middle tdbtn">
                    <a class="btn btn-xs btn-danger" data-toggle="modal" href='#arquivo{{ $arquivo->id }}'>Excluir</a>
                    <div class="modal fade" id="arquivo{{ $arquivo->id }}" data-backdrop="false">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modalx" aria-hidden="true" onclick="fecharModal('#arquivo{{ $arquivo->id }}')">&times;</button>
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
                                    <button type="button" class="btn btn-default" data-dismiss="modalx" onclick="fecharModal('#arquivo{{ $arquivo->id }}')">Cancelar</button>
                                    <a href="#" class="btn btn-danger" onclick="
                                    post('{{route('titulos.excluir_arq')}}',
                                    {
                                        _token: '{{csrf_token()}}',
                                        idArq: '{{$arquivo->id}}',
                                        idTit: '{{$arquivo->titulos_id}}'
                                    },
                                    '{{ route('titulos.list_arq',$id_titulo) }}');
                                    fecharModal('#arquivo{{ $arquivo->id }}');">Excluir</a>
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
