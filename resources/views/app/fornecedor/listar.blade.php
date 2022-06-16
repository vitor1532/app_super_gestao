@extends('app.layouts.basico')

@section('titulo', $titulo)

@section('conteudo')

	<div class="conteudo-pagina">
			
		<div class="titulo-pagina-2">
			<p>{{$titulo}} - Lista</p>
		</div>

		<div class="menu">

			<ul>
				<li><a href="">Novo</a></li>
				<li><a href="">Consulta</a></li>
			</ul>

		</div>

		<div class="informacao-pagina">
			<div style="width: 30%; margin-left: auto; margin-right: auto;">

				... Lista ...

			</div>
		</div>

	</div>

@endsection