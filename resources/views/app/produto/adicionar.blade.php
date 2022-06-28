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

				@if(isset($produto->id))
					<form method="post" action="{{ route('produto.update', ['produto' => $produto->id]) }}">
						@csrf
					
						@method('PUT')
				@else
					<form method="post" action="{{ route('produto.store') }}">
						@csrf
				@endif

					<input type="hidden" name="id" value="{{ $produto->id ?? '' }}">

					<input type="text" name="nome" placeholder="Nome" class="borda-preta" value="{{ $produto->nome ?? old('nome') }}">
					<div style="color: red;">{{ $errors->has('nome') ? $errors->first('nome') : '' }}</div>

					<input type="text" name="descricao" placeholder="Descrição" class="borda-preta" value="{{ $produto->descricao ?? old('descricao') }}">
					<div style="color: red;">{{ $errors->has('descricao') ? $errors->first('descricao') : '' }}</div>

					<input type="number" name="peso" placeholder="Peso (Kg)" class="borda-preta" value="{{ $produto->peso ?? old('peso') }}">
					<div style="color: red;">{{ $errors->has('peso') ? $errors->first('peso') : '' }}</div>

					<select name="unidade_id" >
						<option>-->Selecione a Unidade de Medida<--</option>

						@foreach($unidades as $unidade)
							<option value="{{ $unidade->id }}"
							{{--@if(old('unidade_id') == $unidade->id) {{ 'selected' }} @endif--}}
							{{ ( $produto->unidade_id ?? old('unidade_id') ) == $unidade->id ? 'selected' : '' }}>
								{{ $unidade->unidade }}
							</option>
						@endforeach

					</select>
					<div style="color: red;">{{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}</div>

					<button type="submit" class="borda-preta">Cadastrar</button>
					{{ $msg ?? '' }}

				</form>

			</div>
		</div>

	</div>

@endsection