<?php

namespace App\Exports;

use App\Produto;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProdutoExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Produto::all();
    }
}
