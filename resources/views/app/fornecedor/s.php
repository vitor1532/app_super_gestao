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

@isset($fornecedores)
	Fornecedor : {{ $fornecedores[0]['nome'] }}
	<br>
	Status: {{ $fornecedores[0]['status'] }}
	<br>
	CNPJ: {{ $fornecedores[0]['cnpj'] ?? 'Não informado'}}
	<br>
	Telefone : ({{ $fornecedores[0]['ddd'] ?? ''}}) {{ $fornecedores[0]['telefone'] ?? 'Não informado'}}

	@switch({{ $fornecedores[0]['ddd']}})

		@case ('11'):
			São Paulo - SP
			@break
		@case('32'):
			Juiz de Fora - MG
			@break
		@case('85'):
			Fortaleza - CE
			@break
		@default
			Estado não identificado
			

	@endswitch
@endisset

<br><hr><br>

@isset($fornecedores)
	Fornecedor : {{ $fornecedores[1]['nome'] }}
	<br>
	Status: {{ $fornecedores[1]['status'] }}
	<br>
	CNPJ: {{ $fornecedores[1]['cnpj'] }}
	<br>
	Telefone : ({{ $fornecedores[1]['ddd'] ?? ''}}) {{ $fornecedores[1]['telefone'] ?? 'Não informado'}}
@endisset

<br><hr><br>

@isset($fornecedores)
	Fornecedor : {{ $fornecedores[2]['nome'] }}
	<br>
	Status: {{ $fornecedores[2]['status'] }}
	<br>
	CNPJ: {{ $fornecedores[2]['cnpj'] }}
	<br>
	Telefone : ({{ $fornecedores[2]['ddd'] ?? ''}}) {{ $fornecedores[2]['telefone'] ?? 'Não informado'}}
@endisset