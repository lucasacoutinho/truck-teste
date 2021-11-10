<?php

namespace App\Http\Requests\Endereco;

use Illuminate\Foundation\Http\FormRequest;

abstract class EnderecoRequestDoc extends FormRequest
{
    public function bodyParameters()
    {
        return [
            'logradouro' => [
                'description' => 'Logradouro do endereço',
                'example' => 'Gabriel H3rtz Seiscentos e Sessenta e Oito',
            ],
            'numero' => [
                'description' => 'Número do endereço',
                'example' => '255',
            ],
            'bairro' => [
                'description' => 'Bairro do endereço',
                'example' => 'São José',
            ],
            'cidade_id' => [
                'description' => 'ID da cidade',
                'example' => '1',
            ],
        ];
    }
}
