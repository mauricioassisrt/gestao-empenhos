<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PessoaUnidade extends Model
{
    protected $fillable = [
        'data', 'pessoa_id', 'unidade_id',
     ];
     public function pessoa()
     {
         return $this->belongsTo(Pessoa::class, 'pessoa_id' );
     }
     public function unidade()
     {
         return $this->belongsTo(Unidade::class, 'unidade_id' );
     }
}
