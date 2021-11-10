<?php

namespace App\Http\Requests\Endereco;

use Illuminate\Validation\Rule;

class EnderecoStoreRequest extends EnderecoRequestDoc
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'logradouro' => ['required', 'string', 'max:191'],
            'numero'     => ['required', 'string', 'max:191'],
            'bairro'     => ['required', 'string', 'max:191'],
            'cidade_id'  => ['required', 'integer', 'min:1', Rule::exists('cidades', 'id')],
        ];
    }
}
