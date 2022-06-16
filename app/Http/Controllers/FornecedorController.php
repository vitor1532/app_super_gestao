<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Fornecedor;

class FornecedorController extends Controller
{

    public function index() {
        return view('app.fornecedor.index', ['titulo' => 'Fornecedores']);
    }

    public function index2() {

        $fornecedores = Fornecedor::all();

    return view('app.fornecedor.index', ['fornecedores' => $fornecedores]);//compact encaminha a variável dada como parametro para a view
    }
}
