<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequisicaoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

            'orcamento_um' => "mimetypes:application/pdf|max:1000",
            'orcamento_dois' => "mimetypes:application/pdf|max:1000",
            'orcamento_tres' => "mimetypes:application/pdf|max:1000",
        ];
    }
    public function messages()
    {
        return [

            // 'orcamento_um.required' => 'Deve ser fornecido pelo menos um orçamento!',
            'orcamento_um.max' => 'O arquivo é maior que o tamanho permitido de 1Mega',
            'orcamento_um.mimetypes' => 'O arquivo deve ser no formato PDF',

            'orcamento_dois.max' => 'O arquivo é maior que o tamanho permitido de 1Mega',
            'orcamento_dois.mimetypes' => 'O arquivo deve ser no formato PDF',

            'orcamento_tres.max' => 'O arquivo é maior que o tamanho permitido de 1Mega',
            'orcamento_tres.mimetypes' => 'O arquivo deve ser no formato PDF',

        ];
    }
}
