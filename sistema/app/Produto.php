<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = [
        'nome', 'lote','descricao', 'valor_unitario',  'categoria_id','fornecedor_id',
    ];
    public function fornecedor()
    {
        return $this->belongsTo(Fornecedor::class, 'fornecedor_id' );
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id' );
    }
}
