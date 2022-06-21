@extends('app.layouts.basico')

@section('titulo', $titulo)

@section('conteudo')

	<div class="conteudo-pagina">
			
		<div class="titulo-pagina-2">
			<p>{{$titulo}}</p>
		</div>

		@include('app.fornecedor.layouts._partials.sub_menu')

		<div class="informacao-pagina">
			<div style="width: 30%; margin-left: auto; margin-right: auto;">

				<form method="post" action="{{ route('app.fornecedor.listar') }}">
					@csrf

					<input type="text" name="nome" placeholder="Nome" class="borda-preta">
					<input type="text" name="site" placeholder="Site" class="borda-preta">
					<select name="uf" class="borda-preta">
						<option value="">--Selecione o Estado--</option>
						<option value="ac">Acre</option>
						<option value="al">Alagoas</option>
						<option value="ap">Amapá</option>
						<option value="am">Amazonas</option>
						<option value="ba">Bahia</option>
						<option value="ce">Ceará</option>
						<option value="df">Distrito Federal</option>
						<option value="es">Espirito Santo</option>
						<option value="go">Goiás</option>
						<option value="ma">Maranhão</option>
						<option value="mt">Mato Grosso</option>
						<option value="ms">Mato Grosso do Sul</option>
						<option value="mg">Minas Gerais</option>
						<option value="pa">Pará</option>
						<option value="pb">Paraíba</option>
						<option value="pr">Paraná</option>
						<option value="pe">Pernambuco</option>
						<option value="pi">Piauí</option>
						<option value="rj">Rio de Janeiro</option>
						<option value="rn">Rio Grande do Norte</option>
						<option value="rs">Rio Grande do Sul</option>
						<option value="ro">Rondônia</option>
						<option value="rr">Roraima</option>
						<option value="sc">Santa Catarina</option>
						<option value="sp">São Paulo</option>
						<option value="se">Sergipe</option>
						<option value="to">Tocantins</option>
					</select>
					<input type="text" name="email" placeholder="E-mail" class="borda-preta">

					<button type="submit" class="borda-preta">Pesquisar</button>

				</form>

			</div>
		</div>

	</div>

@endsection