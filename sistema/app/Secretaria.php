<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Secretaria extends Model
{
    protected $fillable = [
       'nome', 'endereco', 'numero', 'bairro', 'cidade', 'estado', 'cep', 'telefone', 'email'
    ];
}
