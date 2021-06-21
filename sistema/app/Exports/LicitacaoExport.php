<?php

namespace App\Exports;

use App\Licitacao;
use Maatwebsite\Excel\Concerns\FromCollection;

class LicitacaoExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Licitacao::all();
    }
}
