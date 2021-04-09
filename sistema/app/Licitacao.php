<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Licitacao extends Model
{
    protected $fillable = [
        'ano','numero_licitacao', 'modalidade','pregoeiro', 'pregao',  'fonte_recurso', 'reduzido', 'total_produtos', 'valor_final'
    ];

}
