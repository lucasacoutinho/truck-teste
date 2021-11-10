<?php

namespace App\Http\Requests\Endereco;

use Illuminate\Validation\Rule;

class EnderecoUpdateRequest extends EnderecoRequestDoc
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'logradouro' => ['filled', 'string', 'max:191'],
            'numero'     => ['filled', 'string', 'max:191'],
            'bairro'     => ['filled', 'string', 'max:191'],
            'cidade_id'  => ['filled', 'integer', 'min:1', Rule::exists('cidades', 'id')],
        ];
    }
}
