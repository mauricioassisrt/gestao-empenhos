<?php

namespace App\Imports;

use App\Produto;
use Maatwebsite\Excel\Concerns\ToModel;

class ProdutoImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Produto([
            'nome' => $row[0],
            'descricao' => $row[1],
            'categoria_id' => $row[2]
        ]);
    }
}
