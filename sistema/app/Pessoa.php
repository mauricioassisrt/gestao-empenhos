<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    protected $fillable = [
        'name', 'data_nascimento','sexo', 'celular', 'foto_pessoa', 'user_id'
    ];
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id' );
    }
    public function titulo(){
       $titulo = 'Pessoas';
        return $titulo;
    }
    public function pessoas()
    {
          return $this->belongsTo(User::class, 'user_id', 'id' );
    }
}
