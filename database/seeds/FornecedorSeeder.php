<?php

use Illuminate\Database\Seeder;

use \App\Fornecedor;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //registro 1
        //instanciando o obj
        $fornecedor = new Fornecedor();
        $fornecedor->nome = 'Fornecedum';
        $fornecedor->email = 'contato@fornecedum.com.br';
        $fornecedor->uf = 'CE';
        $fornecedor->site = 'fornecedum.com.br';

        $fornecedor->save();

        //registro 2
        //instanciando o método create.
        Fornecedor::create([
            'nome' => 'Fornecedois',
            'email' => 'contato@fornecedois.com.br',
            'uf' => 'MG',
            'site' => 'fornecedois.com.br'
        ]);

    }
}
