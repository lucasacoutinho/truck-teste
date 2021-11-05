<?php

namespace Domain\Ibge;

class IbgeEndpoints
{
    public const IBGE_UF         = 'https://servicodados.ibge.gov.br/api/v1/localidades/estados';
    public const IBGE_CIDADES_UF = 'https://servicodados.ibge.gov.br/api/v1/localidades/estados/*/municipios';
}
