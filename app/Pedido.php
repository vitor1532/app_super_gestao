<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $fillable = ['cliente_id'];

    public function cliente() {
        return $this->belongsTo('App\Cliente', 'cliente_id', 'id');
    }

    public function produtos() {

        return $this->belongsToMany('App\Produto', 'pedidos_produtos');

        //Belongs to many pode receber vários parametros:
        /*
            1 - Modelo do relacionamento NxN em relação ao Modelo que estamos implementando
            2 - É a tabela auxiliar que armazena os registros de relacionamento
            3 - Representa o nome da FK mapeada pelo Modelo na tabela de relacionamento
            4 - Representa o nome da FK da tabela mapeada pelo Modelo utilizado no relacionamento que estamos implementando
        */
    }

    public static function groupId($id) {

        $nomeFornecedores = \DB::table('produtos')
            ->select('fornecedores.nome as fornecedor')
            ->leftJoin('fornecedores', 'produtos.fornecedor_id', '=', 'fornecedores.id');

        return \DB::table('pedidos_produtos')
            ->select(\DB::raw('(COUNT(produto_id)) AS qtd'), 'produto_id', 'produtos.nome')
            ->leftJoin('produtos','pedidos_produtos.produto_id','=','produtos.id')
            ->addSelect([
                'fornecedor' => Fornecedor::query()
                    ->whereColumn('fornecedores.id', 'produtos.fornecedor_id')
                    ->select('fornecedores.nome')
            ])
            ->where('pedido_id','=',$id)
            ->groupBy('produto_id')
            ->get();
    }

}

/*
->joinSub($nomeFornecedores, 'fornecedores', function($join) {
                $join->on('produtos.fornecedor_id', '=', 'fornecedores.id');
            })
        */