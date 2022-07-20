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
    }

    public static function groupId($id) {
        return \DB::table('pedidos_produtos')
            ->select(\DB::raw('(COUNT(produto_id)) AS qtd'), 'produto_id', 'produtos.nome')
            ->leftJoin('produtos','pedidos_produtos.produto_id','=','produtos.id')
            ->where('pedido_id','=',$id)
            ->groupBy('produto_id')
            ->get();
    }

}