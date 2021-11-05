<?php

namespace Domain\Cidades;

use App\Models\Cidade;
use Illuminate\Support\Str;
use Domain\Ibge\IbgeEndpoints;
use Illuminate\Support\Facades\{Http, DB};

class CidadesImportar
{
    public static function importar(int $codigoEstado): void
    {
        $cidades = self::obterCidades($codigoEstado);

        DB::transaction(function () use ($codigoEstado, $cidades) {
            foreach ($cidades as $cidade) {
                Cidade::create([
                    'nome'           => $cidade['nome'],
                    'ibge_cidade_id' => $cidade['id'],
                    'ibge_estado_id' => $codigoEstado,
                ]);
            }
        });
    }

    public static function obterCidades(int $codigoEstado): array
    {
        return Http::get(Str::replace('*', $codigoEstado, IbgeEndpoints::IBGE_CIDADES_UF))->json();
    }
}
