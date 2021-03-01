<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $fillable = [
        'nome_fantasia', 'razao_social', 'cnpj', 'contato', 'email', 'foto_caminho', 'numero', 'endereco', 'bairro', 'cep', 'cidade', 'estado'
    ];

}
