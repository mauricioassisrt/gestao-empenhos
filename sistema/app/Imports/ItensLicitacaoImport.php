<?php

namespace App\Imports;

use App\LicitacaoProduto;
use Maatwebsite\Excel\Concerns\ToModel;

class ItensLicitacaoImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new LicitacaoProduto([
            'quantidade_produto' => $row[0],
            'valor_total_iten' => $row[1],
            'fornecedor_id' => $row[2],
            'produto_id' => $row[3],
            'licitacao_id' => $row[4],
        ]);
    }
}
