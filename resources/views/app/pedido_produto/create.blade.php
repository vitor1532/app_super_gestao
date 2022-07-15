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
			<p>ID do Cliente : {{ $pedido->cliente_id }}</p>
			<div style="width: 30%; margin-left: auto; margin-right: auto;">

				<h4>Itens no pedido:</h4>
				@foreach($pedido->produtos as $produto)

				{{ $produto->nome }}
				<hr>

				@endforeach

				@component('app.pedido_produto.layouts._components.form_create', ['produtos' => $produtos, 'pedido' => $pedido])
				@endcomponent
				{{ $msg ?? '' }}

			</div>
		</div>

	</div>

@endsection