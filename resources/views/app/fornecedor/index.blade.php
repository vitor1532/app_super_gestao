<h3>Fornecedores</h3>

{{-- comentário --}}

@php

	/*

	echo 'Texto php <br>';
	$var = 'texto variável';
	$arr = ['nome' => 'vitor', 'idade' => 26, 'ocupação' => 'estudante'];

	echo $var.'<br>';
	echo '<pre>';
		print_r($arr);
	echo '</pre>';
	*/
	//unless no blade é o contrário do if

@endphp

<br>
{{-- FOR BLADE

@isset($fornecedores)
	@for($i = 0; isset($fornecedores[$i]); $i++)
		Fornecedor : {{ $fornecedores[$i]['nome'] }}
		<br>
		Status: {{ $fornecedores[$i]['status'] }}
		<br>
		CNPJ: {{ $fornecedores[$i]['cnpj'] ?? 'Não informado'}}
		<br>
		Telefone : ({{ $fornecedores[$i]['ddd'] ?? ''}}) {{ $fornecedores[$i]['telefone'] ?? 'Não informado'}} - 
		@switch($fornecedores[$i]['ddd'])
			@case('11')
				São Paulo - SP
				@break
			@case('32')
				Juiz de Fora - MG
				@break
			@case('85')
				Fortaleza - CE
				@break
			@default
				DDD não reconhecido.
				@break

			@endswitch

		<br><br><hr><br>
	@endfor
@endisset
--}}
{{-- FOREACH BLADE
@isset($fornecedores)

	@foreach($fornecedores as $indice => $fornecedor)
	
		Fornecedor : {{ $fornecedor['nome'] }}
		<br>
		Status: {{ $fornecedor['status'] }}
		<br>
		CNPJ: {{ $fornecedor['cnpj'] ?? 'Não informado'}}
		<br>
		Telefone : ({{ $fornecedor['ddd'] ?? ''}}) {{ $fornecedor['telefone'] ?? 'Não informado'}} - 
		@switch($fornecedor['ddd'])
			@case('11')
				São Paulo - SP
				@break
			@case('32')
				Juiz de Fora - MG
				@break
			@case('85')
				Fortaleza - CE
				@break
			@default
				DDD não reconhecido.
				@break

			@endswitch

		<br><br><hr><br>

	@endforeach

@endisset
--}}

@isset($fornecedores)

	@forelse($fornecedores as $indice => $fornecedor)

		Iteração atual: {{$loop->iteration}}{{--Só disponível nos laços foreach e forelse--}}
	
		<br>

		Fornecedor : {{ $fornecedor['nome'] }}
		<br>
		Status: {{ $fornecedor['status'] }}
		<br>
		CNPJ: {{ $fornecedor['cnpj'] ?? 'Não informado'}}
		<br>
		Telefone : ({{ $fornecedor['ddd'] ?? ''}}) {{ $fornecedor['telefone'] ?? 'Não informado'}} - 
		@switch($fornecedor['ddd'])
			@case('11')
				São Paulo - SP
				@break
			@case('32')
				Juiz de Fora - MG
				@break
			@case('85')
				Fortaleza - CE
				@break
			@default
				DDD não reconhecido.
				@break

			@endswitch
		<br>
		@if($loop->first) {{--retorna true na primeira iteração do loop--}}
			Primeira iteração do loop
		@endif
		@if($loop->last) {{--retorna true na primeira iteração do loop--}}
			Última iteração do loop

			<br>

			Total de registros: {{ $loop->count }}
		@endif

		<br><br><hr><br>
		@empty
			Não existem fornecedores cadastrados!!!

	@endforelse

@endisset