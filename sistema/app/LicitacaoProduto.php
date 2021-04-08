<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LicitacaoProduto extends Model
{
    protected $fillable = [
        'quantidade_produto', 'valor_total_iten', 'licitacao_id', 'fornecedor_id', 'produto_id',
    ];

    //'fornecedor_id'
    public function fornecedor()
    {
        return $this->belongsTo(Fornecedor::class, 'fornecedor_id');
    }
    public function produto()
    {
        return $this->belongsTo(Produto::class, 'produto_id' );
    }
    public function licitacao()
    {
        return $this->belongsTo(Licitacao::class, 'licitacao_id' );
    }
}
