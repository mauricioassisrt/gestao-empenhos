<?php

namespace App\Exports;

use App\Categoria;
use Maatwebsite\Excel\Concerns\FromCollection;

class CategoriaExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Categoria::select("id", 'nome_categoria')->get();
    }
}
