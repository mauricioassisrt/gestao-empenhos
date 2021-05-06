<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequisicaoProduto extends Model
{

    protected $fillable = [
        'quantidade_produto', 'valor_total_iten','requisicao_id', 'produto_id', 'licitacao_produto_id'
    ];
    public function requisicaos()
    {
        return $this->belongsTo(Requisicao::class, 'requisicao_id' );
    }
    public function produtos()
    {
        return $this->belongsTo(Produto::class, 'produto_id' );
    }
    public function licitacaoProdutos()
    {
        return $this->belongsTo(LicitacaoProduto::class, 'licitacao_produto_id' );
    }
}
