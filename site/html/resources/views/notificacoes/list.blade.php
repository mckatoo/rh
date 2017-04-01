@if (isset($notificacao))
	<div class="table-responsive">
		<table class="table table-striped table-bordered table-hover">
			<tbody>
				@foreach ($notificacao->slice(0, 7) as $not)
					<tr>
						<td>{{ $not->notificacao }}</td>
						<td><span class="pull-right text-muted small"><em>{{ $not->created_at->format('d/m/Y H:i') }}</em></td>
					</tr>
				@endforeach
			</tbody>
		</table>
		<a href="{{ route('notificacoes.index') }}" class="btn btn-block btn-default">Ver Todas Notificações</a>
	</div>
@endif