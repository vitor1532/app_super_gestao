<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    
    protected $table = 'produtos';

    use SoftDeletes;

    protected $fillable = ['nome', 'descricao', 'peso', 'unidade_id', 'fornecedor_id'];

    public function itemDetalhe() {

        return $this->hasOne('App\itemDetalhe', 'produto_id', 'id');

        //produto tem 1 produtoDetalhe

    }

    public function fornecedor() {

        return $this->belongsTo('App\Fornecedor');

    }
}
