<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequisicaoProduto extends Model
{

    protected $fillable = [
        'quantidade_produto', 'valor_total_iten','requisicao_id', 'produto_id',
    ];
    public function requisicaos()
    {
        return $this->belongsTo(Requisicao::class, 'requisicao_id' );
    }
    public function produtos()
    {
        return $this->belongsTo(Produtos::class, 'produto_id' );
    }

}
