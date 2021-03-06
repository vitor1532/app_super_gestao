@if(isset($pedido->id))
	<form method="post" action="{{ route('pedido.update', ['pedido' => $pedido->id]) }}">
		@csrf
	
		@method('PUT')
@else
	<form method="post" action="{{ route('pedido.store') }}">
		@csrf
@endif

	<input type="hidden" name="id" value="{{ $pedido->id ?? '' }}">

	<select name="cliente_id">
		<option>--> Selecione o Cliente <--</option>

		@foreach($clientes as $cliente)
			<option value="{{ $cliente->id }}"
					@if(old('cliente_id') == $cliente->id) {{ 'selected' }} @endif
					{{ ( $pedido->cliente_id ?? old('cliente_id') ) == $cliente->id ? 'selected' : '' }}>
						{{ $cliente->nome }}
			</option>
		@endforeach

	</select>
	{{ $errors->has('cliente_id') ? $errors->first('cliente_id') : '' }}

	<button type="submit" class="borda-preta">Cadastrar</button>

</form>