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
	CNPJ: {{ $fornecedores[0]['cnpj'] }}
@endisset