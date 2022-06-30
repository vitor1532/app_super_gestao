@if(isset($produto_detalhe->id))
	<form method="post" action="{{ route('produto.update', ['produto' => $produto_detalhe->id]) }}">
		@csrf
	
		@method('PUT')
@else
	<form method="post" action="{{ route('produto-detalhe.store') }}">
		@csrf
@endif

	<input type="text" name="produto_id" placeholder="ID do produto" class="borda-preta" value="{{ $produto_detalhe->produto_id ?? old('produto_id') }}">
	<div style="color: red;">{{ $errors->has('produto_id') ? $errors->first('produto_id') : '' }}</div>

	<input type="text" name="comprimento" placeholder="Comprimento" class="borda-preta" value="{{ $produto_detalhe->comprimento ?? old('comprimento') }}">
	<div style="color: red;">{{ $errors->has('comprimento') ? $errors->first('comprimento') : '' }}</div>

	<input type="number" name="largura" placeholder="Largura" class="borda-preta" value="{{ $produto_detalhe->largura ?? old('largura') }}">
	<div style="color: red;">{{ $errors->has('largura') ? $errors->first('largura') : '' }}</div>

	<input type="number" name="altura" placeholder="Altura" class="borda-preta" value="{{ $produto_detalhe->altura ?? old('altura') }}">
	<div style="color: red;">{{ $errors->has('altura') ? $errors->first('altura') : '' }}</div>

	<select name="unidade_id" >
		<option>--> Selecione a Unidade de Medida <--</option>

		@foreach($unidades as $unidade)
			<option value="{{ $unidade->id }}"
			@if(old('unidade_id') == $unidade->id) {{ 'selected' }} @endif
			{{ ( $produto_detalhe->unidade_id ?? old('unidade_id') ) == $unidade->id ? 'selected' : '' }}>
				{{ $unidade->unidade }}
			</option>
		@endforeach

	</select>
	<div style="color: red;">{{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}</div>

	<button type="submit" class="borda-preta">Cadastrar</button>

</form>