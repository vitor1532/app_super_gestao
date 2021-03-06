@extends('app.layouts.basico')

@section('titulo', $titulo)

@section('conteudo')

	<div class="conteudo-pagina">
			
		<div class="titulo-pagina-2">
			<p>{{ $titulo }}</p>
		</div>

		@include('app.cliente.layouts._partials.sub_menu')

		<div class="informacao-pagina">
			<div style="width: 30%; margin-left: auto; margin-right: auto;">
				<table border="1" style="text-align: left;">
					
					<tr>
						<td>Nome do cliente: </td>
						<td>{{ $cliente->nome }}</td>
					</tr>

				</table>
			</div>
		</div>

@endsection