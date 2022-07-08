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
						
						@foreach($fornecedores as $fornecedor)

							<tr>
								<td>{{ $fornecedor->nome }}</td>
								<td>{{ $fornecedor->site }}</td>
								<td>{{ $fornecedor->uf }}</td>
								<td>{{ $fornecedor->email }} </td>
								<td><a href="{{ route('app.fornecedor.excluir', $fornecedor->id) }}">Excluir</a></td>
								<td><a href="{{ route('app.fornecedor.editar', $fornecedor->id) }}">Editar</a></td>
							</tr>

							<tr>
								<td colspan="6">
									<p>Lista de Produtos</p>
									<table border="1" style="margin: 20px;">
										<thead>
											<tr>
												<th>ID</th>
												<th>Nome</th>
											</tr>
										</thead>
										<tbody>
											
											@foreach($fornecedor->produtos as $produto)
												<tr>
													<td>{{ $produto->id }}</td>
													<td>{{ $produto->nome }}</td>
												</tr>
											@endforeach
										</tbody>
									</table>
								</td>
							</tr>

						@endforeach

					</tbody>

				</table>

				
				<hr>
				{{ $fornecedores->appends($request)->links() }}
				<br>
				{{--
				{{ $fornecedores->count() }} - Total de registros por página.
				<br>
				{{ $fornecedores->total() }} - Total de registros da consulta.
				<br>
				{{ $fornecedores->firstItem() }} - Número do primeiro registro da página.
				<br>
				{{ $fornecedores->lastItem() }} - Número do último registro da página.
				--}}
				<br>
				Exibindo {{ $fornecedores->count() }} fornecedores de {{ $fornecedores->total() }} (de {{ $fornecedores->firstItem() }} a {{ $fornecedores->lastItem() }})
				<br>

			</div>
		</div>

	</div>

@endsection