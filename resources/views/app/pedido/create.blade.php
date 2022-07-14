@extends('app.layouts.basico')

@section('titulo', $titulo)

@section('conteudo')

	<div class="conteudo-pagina">

		<div class="titulo-pagina-2">
			<p>{{'Adicionar '.$titulo}}</p>
		</div>

		@include('app.pedido.layouts._partials.sub_menu')

		<div class="informacao-pagina">
			<div style="width: 30%; margin-left: auto; margin-right: auto;">

				@component('app.pedido.layouts._components.form_create_edit', ['clientes' => $clientes])
				@endcomponent
				{{ $msg ?? '' }}

			</div>
		</div>

	</div>

@endsection