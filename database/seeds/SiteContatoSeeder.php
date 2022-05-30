<?php

use Illuminate\Database\Seeder;

use \App\SiteContato;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contato = new SiteContato();

        $contato->nome = 'Sistema SG';
        $contato->telefone = '(32) 99999-8888';
        $contato->email = 'contato@sistema.com';
        $contato->motivo_contato = 1;
        $contato->mensagem = 'Seja bem-vindo ao sistema';

        $contato->save();
    }
}
