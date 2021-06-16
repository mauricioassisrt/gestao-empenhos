<?php

namespace App\Imports;

use App\Categoria;
use Maatwebsite\Excel\Concerns\ToModel;

class CategoriaImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Categoria([
            'nome_categoria' => $row[0],
        ]);
    }
}
