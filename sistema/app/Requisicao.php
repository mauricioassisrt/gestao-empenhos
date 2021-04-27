<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requisicao extends Model
{
    protected $fillable = [
        'justificativa','observacao' ,'requisicao_ano',
        'total_produtos', 'valor_final', 'unidade_id', 'orcamento_um', 'orcamento_dois', 'orcamento_tres', 'status','status_justificativa'
    ];
    public function unidades()
    {
        return $this->belongsTo(Unidade::class, 'unidade_id' );
    }


}
