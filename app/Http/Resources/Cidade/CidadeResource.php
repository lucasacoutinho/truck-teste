<?php

namespace App\Http\Resources\Cidade;

use Illuminate\Http\Resources\Json\JsonResource;

class CidadeResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'           => $this->id,
            'nome'         => $this->nome,
            'estado_sigla' => $this->estado_sigla,
            'created_at'   => $this->created_at,
            'updated_at'   => $this->updated_at
        ];
    }
}
