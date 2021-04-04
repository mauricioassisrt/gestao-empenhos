<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requisicao extends Model
{
    protected $fillable = [
        'fonte_recurso', 'justificativa','observacao', 'licitacao_ano',  'pregao','reduzido','requisicao_ano',
        'total_produtos', 'valor_final', 'unidade_id'
    ];
    public function unidades()
    {
        return $this->belongsTo(Unidade::class, 'unidade_id' );
    }
    public function pessoaUnidade()
    {
        return $this->belongsTo(PessoaUnidade::class, 'unidade_id' );
    }

}
