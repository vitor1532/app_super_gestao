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

				@component('app.produto.layouts._components.form', ['unidades' => $unidades, 'produto' => $produto, 'fornecedores' => $fornecedores])
				@endcomponent
				{{ $msg ?? '' }}

			</div>
		</div>

	</div>

@endsection