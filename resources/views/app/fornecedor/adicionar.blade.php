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

				<form method="post" action="{{ route('app.fornecedor.adicionar') }}">
					@csrf

					<input type="hidden" name="id" value="{{ $fornecedor->id ?? '' }}">

					<input type="text" name="nome" placeholder="Nome" class="borda-preta" value="{{ $fornecedor->nome ?? old('nome') }}">
					<div style="color: red;">{{ $errors->has('nome') ? $errors->first('nome') : '' }}</div>

					<input type="text" name="site" placeholder="Site" class="borda-preta" value="{{ $fornecedor->site ?? old('site') }}">
					<div style="color: red;">{{ $errors->has('site') ? $errors->first('site') : '' }}</div>

					<select name="uf" class="borda-preta" >
						<option value="">--Selecione o Estado--</option>
						@foreach($uf as $sigla => $estado)
							<option value="{{ $sigla }}"
							@if(old('uf') == $sigla) {{ 'selected' }} @elseif(isset($fornecedor->uf) && $sigla == $fornecedor->uf) {{'selected'}} @endif>
								{{ $estado }}
							</option>
						@endforeach
					</select>
					<div style="color: red;">{{ $errors->has('uf') ? $errors->first('uf') : '' }}</div>

					<input type="text" name="email" placeholder="E-mail" class="borda-preta" value="{{$fornecedor->email ??  old('email') }}">
					<div style="color: red;">{{ $errors->has('email') ? $errors->first('email') : '' }}</div>

					<button type="submit" class="borda-preta">Cadastrar</button>
					{{ $msg ?? '' }}

				</form>

			</div>
		</div>

	</div>

@endsection