<?php

namespace App\Console\Commands\Cidade;

use Throwable;
use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Domain\Cidade\CidadesImportar;
use Illuminate\Support\Facades\Log;

class Importar extends Command
{
    private const ESTADO_PADRAO = 'MG';

    protected $signature   = 'cidades:importar {estado?}';
    protected $description = 'Importa as cidades do estado informado para o banco de dados.';

    public function handle()
    {
        $estado = Str::upper($this->argument('estado') ?? self::ESTADO_PADRAO);

        $this->info("Importando cidades do estado {$estado}...");

        try {
            CidadesImportar::importar(codigoEstado($estado));

            $this->info('Cidades importadas com sucesso!');
        } catch (Throwable $t) {
            $this->error("Erro ao importar cidades do estado {$estado}");

            if(Str::contains(Str::lower($t->getMessage()), 'duplicate')) {
                $this->error("Cidades do estado {$estado}, já existem no banco de dados.");
            }

            Log::error("Erro ao importar cidades do estado {$estado}: {$t->getMessage()}");

            return Command::FAILURE;
        }

        return Command::SUCCESS;
    }
}
