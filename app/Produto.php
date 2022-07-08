<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produto extends Model
{
    use SoftDeletes;

    protected $fillable = ['nome', 'descricao', 'peso', 'unidade_id', 'fornecedor_id'];

    public function produtoDetalhe() {

        return $this->hasOne('App\ProdutoDetalhe', 'produto_id', 'id');

        //produto tem 1 produtoDetalhe

    }

    public function fornecedor() {

        return $this->belongsTo('App\Fornecedor', 'produto_id', 'id');

    }
}