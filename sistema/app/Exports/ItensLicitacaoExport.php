<?php

namespace App\Exports;

use App\LicitacaoProduto;
use Maatwebsite\Excel\Concerns\FromCollection;

class ItensLicitacaoExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return LicitacaoProduto::all();
    }
}
