@extends('app.layouts.basico')

@section('titulo', $titulo)

@section('conteudo')

	<div class="conteudo-pagina">
			
		<div class="titulo-pagina-2">
			<p>{{'Listagem de '.$titulo.'s' }}</p>
		</div>

		@include('app.cliente.layouts._partials.sub_menu')

		<div class="informacao-pagina">
			<div style="width: 90%; margin-left: auto; margin-right: auto;">

				<table border="1" width="100%">
					
					<thead>
						<tr>
							<th>Nome</th>
							<th></th>
							<th></th>
							<th></th>
						</tr>
					</thead>

					<tbody>
						
						@foreach($clientes as $cliente)

							<tr>
								<td>{{ $cliente->nome }}</td>

								<td><a href="{{ route('cliente.show', ['cliente' => $cliente->id]) }}">Visualizar</a></td>
								<td><a href="{{ route('cliente.edit', ['cliente' => $cliente->id]) }}">Editar</a></td>
								<td>
									<form id="form_{{$cliente->id}}" method="post" action="{{ route('cliente.destroy', ['cliente' => $cliente->id]) }}">
										@method('DELETE')
										@csrf
										<a href="#" onclick="document.getElementById('form_{{$cliente->id}}').submit()">Excluir</a>
									</form>
								</td>
										{{--<button type="submit">Excluir</button>--}}
									
							</tr>

						@endforeach

					</tbody>

				</table>

				
				<hr>
				{{ $clientes->appends($request)->links() }}
				<br>
				
				<br>
				Exibindo {{ $clientes->count() }} clientes de {{ $clientes->total() }} (de {{ $clientes->firstItem() }} a {{ $clientes->lastItem() }})
				<br>
				{{ $msg ?? '' }}

			</div>
		</div>

	</div>

@endsection