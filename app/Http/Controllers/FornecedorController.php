<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Fornecedor;

class FornecedorController extends Controller
{

    public function index() {
        return view('app.fornecedor.index', ['titulo' => 'Fornecedores']);
    }

    public function listar() {
        return view('app.fornecedor.listar', ['titulo' => 'Fornecedores - Lista']);
    }

    public function menuAdicionar() {
        return view('app.fornecedor.adicionar', ['titulo' => 'Fornecedores - Adicionar']);
    }

    public function adicionar() {
        
    }

    public function index2() {

        $fornecedores = Fornecedor::all();

    return view('app.fornecedor.index', ['fornecedores' => $fornecedores]);//compact encaminha a variável dada como parametro para a view
    }
}
