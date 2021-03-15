<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    protected $fillable = [
        'nome_fornecedor', 'cnpj','email' , 'telefone', 'numero', 'endereco', 'bairro', 'cep', 'cidade', 'estado'
    ];
}
