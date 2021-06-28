<?php

namespace App\Imports;

use App\Licitacao;
use Maatwebsite\Excel\Concerns\ToModel;

class LicitacaoImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Licitacao([
            'ano' => $row[0],
            'numero_licitacao' =>$row[1],
            'modalidade' => $row[2],
            'pregao' => $row[3],
        ]);
    }
}
