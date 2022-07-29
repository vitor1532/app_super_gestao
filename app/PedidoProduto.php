<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Http\Request;

class PedidoProduto extends Model
{
    protected $table = 'pedidos_produtos';

    protected $fillable = ['pedido_id', 'produto_id', 'quantidade'];

    public static function store(Request $request) {

        return static::create($request->all());
    }

}
