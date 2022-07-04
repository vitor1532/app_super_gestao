@extends('app.layouts.basico')

@section('titulo', $titulo)

@section('conteudo')

	<div class="conteudo-pagina">
			
		<div class="titulo-pagina-2">
			<p>{{ $titulo }}</p>
		</div>

		@include('app.produto.layouts._partials.sub_menu')

		<div class="informacao-pagina">
			<div style="width: 30%; margin-left: auto; margin-right: auto;">
				<table border="1" style="text-align: left;">
					
					<tr>
						<td>ID: </td>
						<td>{{ $produto->id }}</td>
					</tr>

					<tr>
						<td>Nome: </td>
						<td>{{ $produto->nome }}</td>
					</tr>

					<tr>
						<td>Descrição: </td>
						<td>{{ $produto->descricao }}</td>
					</tr>

					<tr>
						<td>Peso: </td>
						<td>{{ $produto->peso }}</td>
					</tr>

					<tr>
						<td>Unidade de Medida: </td>
						<td>
							@foreach($unidades as $unidade)
								@if($unidade->id == $produto->unidade_id)
									{{$unidade->unidade}}
								@endif
							@endforeach
						</td>
					</tr>

					<tr>
						<td>Comprimento: </td>
						<td>{{ $produto->produtoDetalhe->comprimento.' cm' ?? '' }}</td>
					</tr>

					<tr>
						<td>Largura: </td>
						<td>{{ $produto->produtoDetalhe->largura.' cm' ?? '' }}</td>
					</tr>

					<tr>
						<td>Altura: </td>
						<td>{{ $produto->produtoDetalhe->altura.' cm' ?? '' }}</td>
					</tr>

				</table>
			</div>
		</div>

@endsection