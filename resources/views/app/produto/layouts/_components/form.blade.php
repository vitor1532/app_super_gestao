@if(isset($produto->id))
	<form method="post" action="{{ route('produto.update', ['produto' => $produto->id]) }}">
		@csrf
	
		@method('PUT')
@else
	<form method="post" action="{{ route('produto.store') }}">
		@csrf
@endif

	<select name="fornecedor_id" >
		<option>--> Selecione um Fornecedor <--</option>

			@foreach($fornecedores as $fornecedor)
				<option value="{{ $fornecedor->id }}"
					@if(old('fornecedor_id') == $fornecedor->id) {{ 'selected' }} @endif
					{{ ( $produto->fornecedor_id ?? old('unidade_id') ) == $fornecedor->id ? 'selected' : '' }}>
						{{ $fornecedor->nome }}
				</option>
			@endforeach

	</select>

	<input type="hidden" name="id" value="{{ $produto->id ?? '' }}">

	<input type="text" name="nome" placeholder="Nome" class="borda-preta" value="{{ $produto->nome ?? old('nome') }}">
	<div style="color: red;">{{ $errors->has('nome') ? $errors->first('nome') : '' }}</div>

	<input type="text" name="descricao" placeholder="Descrição" class="borda-preta" value="{{ $produto->descricao ?? old('descricao') }}">
	<div style="color: red;">{{ $errors->has('descricao') ? $errors->first('descricao') : '' }}</div>

	<input type="number" name="peso" placeholder="Peso" class="borda-preta" value="{{ $produto->peso ?? old('peso') }}">
	<div style="color: red;">{{ $errors->has('peso') ? $errors->first('peso') : '' }}</div>

	<select name="unidade_id" >
		<option>--> Selecione a Unidade de Medida <--</option>

		@foreach($unidades as $unidade)
			<option value="{{ $unidade->id }}"
			@if(old('unidade_id') == $unidade->id) {{ 'selected' }} @endif
			{{ ( $produto->unidade_id ?? old('unidade_id') ) == $unidade->id ? 'selected' : '' }}>
				{{ $unidade->unidade }}
			</option>
		@endforeach

	</select>
	<div style="color: red;">{{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}</div>

	<button type="submit" class="borda-preta">Cadastrar</button>

</form>