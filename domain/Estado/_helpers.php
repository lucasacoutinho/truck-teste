<?php

use Domain\Ibge\IbgeEndpoints;
use Illuminate\Support\Facades\Http;

if (!function_exists('codigoEstado')) {
    function codigoEstado(string $estado)
    {
        $estados = Http::get(IbgeEndpoints::IBGE_UF)->json();

        $codigoDoEstado = ((object) collect($estados)->where('sigla', $estado)->firstOrFail())->id;

        return $codigoDoEstado;
    }
}
