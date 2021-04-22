<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = [
        'nome', 'lote','descricao',  'categoria_id',
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id' );
    }
}
