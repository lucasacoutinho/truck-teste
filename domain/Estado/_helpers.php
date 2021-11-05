<?php

use Domain\Ibge\IbgeEndpoints;
use Illuminate\Support\Facades\Http;

if (!function_exists('codigoEstado')) {
    function codigoEstado(string $estado): int
    {
        $estados = Http::get(IbgeEndpoints::IBGE_UF)->json();
        $estados = collect($estados);

        $codigoDoEstado = ((object) $estados->where('sigla', $estado)->first())->id;

        return $codigoDoEstado;
    }
}
