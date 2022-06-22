@extends('app.layouts.basico')

@section('titulo', $titulo)

@section('conteudo')

	<div class="conteudo-pagina">
			
		<div class="titulo-pagina-2">
			<p>{{$titulo}}</p>
		</div>

		@include('app.fornecedor.layouts._partials.sub_menu')

		<div class="informacao-pagina">
			<div style="width: 30%; margin-left: auto; margin-right: auto;">

				<form method="post" action="{{ route('app.fornecedor.listar') }}">
					@csrf

					<input type="text" name="nome" placeholder="Nome" class="borda-preta">
					<input type="text" name="site" placeholder="Site" class="borda-preta">
					<select name="uf" class="borda-preta">
						<option value="">--Selecione o Estado--</option>
						@foreach($uf as $sigla => $estado)
							<option value="{{ $sigla }}">{{ $estado }}</option>
						@endforeach
					</select>
					<input type="text" name="email" placeholder="E-mail" class="borda-preta">

					<button type="submit" class="borda-preta">Pesquisar</button>

				</form>

			</div>
		</div>

	</div>

@endsection