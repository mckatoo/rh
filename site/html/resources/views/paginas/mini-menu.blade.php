<nav class="navbar background-mini-menu navbar-fixed-top" role="navigation">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset('images/navbar-brand.png') }}" alt="IESI - Comissão Própria de Avaliação" /></a>
        <ul class="nav navbar-nav">
            <li>
                <a class=".a-mini-menu" data-toggle="modal" href='#modal-id'>Trocar Senha</a>
                <div class="modal fade" id="modal-id" data-backdrop="false">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Trocar Senha</h4>
                            </div>
                            <div class="modal-body">
                                {!! Form::open(['route' => ['updateUser'], 'method' => 'POST', 'autocomplete' => 'off']) !!}
                        @if (session('sucesso'))
                            <div class="alert alert-success">
                                {{ session('sucesso') }}
                            </div>
                        @endif
                        @if(session('erro'))
                            <div class="alert alert-danger">
                                {{session('erro')}}
                            </div>
                        @endif
                        <div class="hidden">
                            {!! Form::text('name', Auth::user()->name) !!}
                            {!! Form::text('tipo', Auth::user()->tipo->id) !!}
                            {!! Form::email('email', Auth::user()->email) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('password', 'Senha', ['class' => 'control-label']) !!}
                            {!! Form::password('password', ['class' => 'form-control', 'id' => 'password','required' => 'required', 'autofocus' => 'autofocus']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('password_confirmation', 'Confirmar senha', ['class' => 'control-label']) !!}
                            {!! Form::password('password_confirmation', ['class' => 'form-control', 'id' => 'password_confirmation','required' => 'required']) !!}
                        </div>
                        <div class="modal-footer">
                                <button type="reset" class="btn btn-primary">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Atualizar</button>
                        </div>
                        {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <a href="{{ route('relatorios.professor') }}">Relatório</a>
            </li>
            <li>
                <a href="{{ url('logout') }}">Sair</a>
            </li>
        </ul>
    </div>
</nav>