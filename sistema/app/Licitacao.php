<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Licitacao extends Model
{
    protected $fillable = [
        'ano','numero_licitacao', 'modalidade','pregoeiro', 'pregao',  'fonte_recurso', 'reduzido',
    ];

    //'fornecedor_id'
    // public function fornecedor()
    // {
    //     return $this->belongsTo(Fornecedor::class, 'fornecedor_id' );
    // }
}
