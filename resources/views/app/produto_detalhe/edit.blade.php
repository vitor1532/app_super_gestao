@extends('app.layouts.basico')

@section('titulo', $titulo)

@section('conteudo')

	<div class="conteudo-pagina">
			
		<div class="titulo-pagina-2">
			<p>{{$titulo}}</p>
		</div>

		@include('app.produto.layouts._partials.sub_menu')

		<div class="informacao-pagina">
			<div style="width: 30%; margin-left: auto; margin-right: auto;">

				@component('app.produto_detalhe._components.form_create_edit', ['unidades' => $unidades, 'produto_detalhe' => $produto_detalhe, 'produtos' => $produtos])
				@endcomponent
				{{ $msg ?? '' }}

			</div>
		</div>

	</div>

@endsection