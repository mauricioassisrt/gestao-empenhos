<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unidade extends Model
{
    protected $fillable = [
        'nome', 'endereco', 'numero', 'bairro', 'cidade', 'estado', 'cep', 'telefone', 'email', 'secretaria_id'
     ];

     public function secretaria()
     {
         return $this->belongsTo(Secretaria::class, 'secretaria_id' );
     }
}
