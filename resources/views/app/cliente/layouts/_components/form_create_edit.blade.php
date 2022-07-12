@if(isset($cliente->id))
	<form method="post" action="{{ route('cliente.update', ['cliente' => $cliente->id]) }}">
		@csrf
	
		@method('PUT')
@else
	<form method="post" action="{{ route('cliente.store') }}">
		@csrf
@endif

	<input type="hidden" name="id" value="{{ $cliente->id ?? '' }}">

	<input type="text" name="nome" placeholder="Nome" class="borda-preta" value="{{ $cliente->nome ?? old('nome') }}">
	<div style="color: red;">{{ $errors->has('nome') ? $errors->first('nome') : '' }}</div>


	<button type="submit" class="borda-preta">Cadastrar</button>

</form>