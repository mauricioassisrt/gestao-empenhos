<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    protected $fillable = [
        'name', 'data_nascimento','sexo', 'celular', 'foto_pessoa', 'user_id', 'secretaria_id'
    ];
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id' );
    }

    public function secretaria()
    {
        return $this->belongsTo(Secretaria::class, 'secretaria_id' );
    }

    public function pessoaUnidades()
    {
        return $this->belongsTo(PessoaUnidade::class, 'id' );
    }
}
