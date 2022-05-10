<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller
{

    public function index() {

        $fornecedores = [
        0 => [
            "nome" => "fornecedor 1",
            "status" => "N",
            "cnpj" => null,
            "telefone" => "99999-9999",
            "ddd" => "11",
        ],
        1 => [
            "nome" => "fornecedor 2",
            "status" => "S",
            "cnpj" => "1",
            "telefone" => "00000-9999",
            "ddd" => "85"
        ],
        2 => [
            "nome" => "fornecedor 2",
            "status" => "S",
            "cnpj" => "3",
            "telefone" => "00000-9699",
            "ddd" => "32"
        ]
    ];

    return view('app.fornecedor.index', compact('fornecedores'));//compact encaminha a varável dada como parametro para a view
    }
}
