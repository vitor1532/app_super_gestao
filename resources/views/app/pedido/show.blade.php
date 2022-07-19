<?php use App\Pedido; ?>

@extends('app.layouts.basico')

@section('titulo', $titulo)

@section('conteudo')

	<div class="conteudo-pagina">
			
		<div class="titulo-pagina-2">
			<p>{{ $titulo }}</p>
		</div>

		@include('app.pedido.layouts._partials.sub_menu')

		<div class="informacao-pagina">
			<div style="width: 30%; margin-left: auto; margin-right: auto;">
				<table border="1" style="text-align: left;">
					
					<tr>
						<td>ID do pedido: </td>
						<td>{{ $pedido->id }}</td>
					</tr>

					<tr>
						<td>Nome do cliente: </td>
						<td>{{ $pedido->cliente->nome }}</td>
					</tr>
					{{--dd($group)--}}
					<tr>
						<td colspan="6">
							<p>Produtos:</p>
							<table border="1" style="margin: 20px;">
								<thead>
									<tr>
										<th>Nome</th>
										<th>Quantidade</th>
									</tr>
								</thead>
								<tbody>
									@foreach($pedido->produtos as $produto)
										<tr>
											<td>{{ $produto->nome }}</td>
											<td>{{ $group }}</td>
										</tr>
									@endforeach
								</tbody>
							</table>
						</td>
					</tr>

				</table>
			</div>
		</div>

		{{--dd($group)--}}

@endsection