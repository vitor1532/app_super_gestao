@extends('app.layouts.basico')

@section('titulo', $titulo)

@section('conteudo')

	<div class="conteudo-pagina">

		<div class="titulo-pagina-2">
			<p>{{'Adicionar '.$titulo}}</p>
		</div>

		@include('app.pedido_produto.layouts._partials.sub_menu')

		<div class="informacao-pagina">
			<h4>Detalhes do Pedido</h4>
			<p>ID do pedido : {{ $pedido->id }}</p>
			<p>Cliente : {{ $pedido->cliente->nome }}</p>
			<div style="width: 30%; margin-left: auto; margin-right: auto;">

				<h4>Itens no pedido:</h4>

				<table width="100%" border="1">
					
					<thead>
						<tr>
							<th>ID</th>
							<th>Nome</th>
							<th>Data de inclusão</th>
						</tr>
					</thead>

					<tbody>
						@foreach($pedido->produtos as $produto)
							<tr>
								<td> {{ $produto->id }} </td>
								<td> {{ $produto->nome }} </td>
								<td> {{ $produto->pivot->created_at->format('d/m/Y') }} </td>
							</tr>
						@endforeach
						
					</tbody>

				</table>

				@component('app.pedido_produto.layouts._components.form_create', ['produtos' => $produtos, 'pedido' => $pedido])
				@endcomponent
				{{ $msg ?? '' }}

			</div>
		</div>

	</div>

@endsection