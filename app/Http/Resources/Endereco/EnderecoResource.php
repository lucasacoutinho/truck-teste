<?php

namespace App\Http\Resources\Endereco;

use Illuminate\Http\Resources\Json\JsonResource;

class EnderecoResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'         => $this->id,
            'logradouro' => $this->logradouro,
            'numero'     => $this->numero,
            'bairro'     => $this->bairro,
            'cidade_id'  => $this->cidade_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
