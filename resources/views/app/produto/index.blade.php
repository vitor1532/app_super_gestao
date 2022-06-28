@extends('app.layouts.basico')

@section('titulo', $titulo)

@section('conteudo')

	<div class="conteudo-pagina">
			
		<div class="titulo-pagina-2">
			<p>{{'Listagem de '.$titulo }}</p>
		</div>

		@include('app.produto.layouts._partials.sub_menu')

		<div class="informacao-pagina">
			<div style="width: 90%; margin-left: auto; margin-right: auto;">

				<table border="1" width="100%">
					
					<thead>
						<tr>
							<th>Nome</th>
							<th>Descrição</th>
							<th>Peso</th>
							<th>Unidade ID</th>
							<th></th>
							<th></th>
							<th></th>
						</tr>
					</thead>

					<tbody>
						
						@foreach($produtos as $produto)

							<tr>
								<td>{{ $produto->nome }}</td>
								<td>{{ $produto->descricao }}</td>
								<td>{{ $produto->peso }}</td>
								<td>{{ $produto->unidade_id }}</td>
								<td><a href="{{ route('produto.show', ['produto' => $produto->id]) }}">Visualizar</a></td>
								<td><a href="{{ route('produto.edit', ['produto' => $produto->id]) }}">Editar</a></td>
								<td>
									<form id="form_{{$produto->id}}" method="post" action="{{ route('produto.destroy', ['produto' => $produto->id]) }}">
										@method('DELETE')
										@csrf
										<a href="#" onclick="document.getElementById('form_{{$produto->id}}').submit()">Excluir</a></td>
										{{--<button type="submit">Excluir</button>--}}
									</form>
							</tr>

						@endforeach

					</tbody>

				</table>

				
				<hr>
				{{ $produtos->appends($request)->links() }}
				<br>
				{{--
				{{ $produtos->count() }} - Total de registros por página.
				<br>
				{{ $produtos->total() }} - Total de registros da consulta.
				<br>
				{{ $produtos->firstItem() }} - Número do primeiro registro da página.
				<br>
				{{ $produtos->lastItem() }} - Número do último registro da página.
				--}}
				<br>
				Exibindo {{ $produtos->count() }} produtos de {{ $produtos->total() }} (de {{ $produtos->firstItem() }} a {{ $produtos->lastItem() }})
				<br>
				{{ $msg ?? '' }}

			</div>
		</div>

	</div>

@endsection