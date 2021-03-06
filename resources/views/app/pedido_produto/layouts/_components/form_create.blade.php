
<form method="post" action="{{ route('pedido-produto.store', ['pedido' => $pedido]) }}">
	@csrf

	<input type="hidden" name="pedido_id" value="{{ $pedido->id }}">

	<select name="produto_id">
		<option value="0">--> Selecione o Produto <--</option>

		@foreach($produtos as $produto)
			<option value="{{ $produto->id }}"
					@if(old('produto_id') == $produto->id) {{ 'selected' }} @endif
					{{ old('produto_id') == $produto->id ? 'selected' : '' }}>
						{{ $produto->nome }}
			</option>
		@endforeach

	</select>
	{{ $errors->has('produto_id') ? $errors->first('produto_id') : '' }}

	<button type="submit" class="borda-preta">Cadastrar</button>

</form>