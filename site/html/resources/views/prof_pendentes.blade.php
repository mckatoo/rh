@if (isset($pendentes))
<div class="panel panel-default">
    <div class="panel-heading">
        <i class="fa fa-pencil fa-fw"></i> Professores Pendentes
        <div class="pull-right">
            <div class="btn-group">
                <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                    Ações
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu pull-right" role="menu">
                @if (Auth::user()->tipo->tipo == 'Administrador')
                    <li><a href="#">Novo Usuário</a>
                    </li>
                @endif
                    <li><a href="#">Novo Professor</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="#">Listar Todos</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <table class="table table-striped table-bordered table-hover">
            <tbody>
                <thead>
                    <tr>
                        <th>NOME</th>
                        <th>E-MAIL</th>
                        <th>CRIADO EM</th>
                    </tr>
                </thead>
                @foreach($pendentes as $p)
                    @if ($professores->where('users_id',$p->id)->count() == 0)
                        <tr>
                            <td>{{$p->name}}</td>
                            <td>{{$p->email}}</td>
                            <td>{{$p->created_at->format('d/m/Y H:i')}}</td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.panel-body -->
</div>
@endif