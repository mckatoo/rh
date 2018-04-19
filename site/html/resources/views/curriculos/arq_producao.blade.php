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
            </tr>
        </thead>
        <tbody>
            @foreach($arq as $arquivo)
            <tr>
                <td class="middle"><a href="{!! route('producoes.download',[$arquivo->id]) !!}">{!! $arquivo->arquivo !!}</a></td>
                <td class="middle">{!! $arquivo->created_at->format('d/m/Y H:i') !!}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endif
