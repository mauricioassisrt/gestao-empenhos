<?php

namespace App\Imports;

use App\Fornecedor;
use Maatwebsite\Excel\Concerns\ToModel;

class FornecedorImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Fornecedor([
            'nome_fornecedor' => $row[0],
            'cnpj' => $row[1],
            'cpf' => $row[2],
            'juridica' => $row[3],
            'telefone' => $row[4],
            'email' => $row[5],
            'endereco' => $row[6],
            'bairro' => $row[7],
            'cep' => $row[8],
            'numero' => $row[9],
            'cidade' => $row[10],
            'estado' => $row[11],
        ]);
    }
}
