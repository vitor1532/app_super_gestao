@extends('app.layouts.basico')

@section('titulo', $titulo)

@section('conteudo')

	<div class="conteudo-pagina">
			
		<div class="titulo-pagina-2">
			<p>{{$titulo}}</p>
		</div>

		@include('app.fornecedor.layouts._partials.sub_menu')

		<div class="informacao-pagina">
			<div style="width: 90%; margin-left: auto; margin-right: auto;">

				<table border="1" width="100%">
					
					<thead>
						<tr>
							<th>Nome</th>
							<th>Site</th>
							<th>Uf</th>
							<th>E-mail</th>
							<th></th>
							<th></th>
						</tr>
					</thead>

					<tbody>
						
						@foreach($fornecedores as $indice => $fornecedor)

							<tr>
								<td>{{ $fornecedor->nome }}</td>
								<td>{{ $fornecedor->site }}</td>
								<td>{{ $fornecedor->uf }}</td>
								<td>{{ $fornecedor->email }} </td>
								<td>Excluir</td>
								<td>Editar</td>
							</tr>

						@endforeach

					</tbody>

				</table>

				

			</div>
		</div>

	</div>

@endsection