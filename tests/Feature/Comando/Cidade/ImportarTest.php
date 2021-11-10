<?php

namespace Tests\Feature\Comando\Cidade;

use Tests\TestCase;
use Domain\Ibge\IbgeEndpoints;
use Illuminate\Support\Facades\Http;

class ImportarTest extends TestCase
{
    private const ESTADO = 'MG';
    private const ESTADO_INEXISTENTE = 'CC';

    public function test_cidades_sao_importadas_com_sucesso()
    {
        $this->artisan('cidades:importar', ['estado' => self::ESTADO])
            ->expectsOutput('Importando cidades do estado '. self::ESTADO .'...')
            ->expectsOutput('Cidades importadas com sucesso!')
            ->assertSuccessful();

        $this->assertDatabaseHas('cidades', [
            'nome'           => 'Acaiaca',
            'estado_sigla'   => 'MG',
            'ibge_cidade_id' => 3100401,
            'ibge_estado_id' => 31
        ]);
    }

    public function test_cidades_sao_importadas_com_sucesso_comando_padrao()
    {
        $this->artisan('cidades:importar')
            ->expectsOutput('Importando cidades do estado '. 'MG' .'...')
            ->expectsOutput('Cidades importadas com sucesso!')
            ->assertSuccessful();

        $this->assertDatabaseHas('cidades', [
            'nome'           => 'Acaiaca',
            'estado_sigla'   => 'MG',
            'ibge_cidade_id' => 3100401,
            'ibge_estado_id' => 31
        ]);
    }

    public function test_cidades_nao_sao_importadas_estado_nao_encontrado()
    {
        $this->artisan('cidades:importar', ['estado' => self::ESTADO_INEXISTENTE])
            ->expectsOutput('Erro ao importar cidades do estado '. self::ESTADO_INEXISTENTE)
            ->assertFailed();

        $this->assertDatabaseMissing('cidades', [
            'nome'           => 'Acaiaca',
            'estado_sigla'   => 'MG',
            'ibge_cidade_id' => 3100401,
            'ibge_estado_id' => 31
        ]);
    }

    public function test_cidades_nao_sao_importadas_falha_requisicao_estados()
    {
        Http::fake([IbgeEndpoints::IBGE_UF => Http::timeout(0)]);

        $this->artisan('cidades:importar', ['estado' => self::ESTADO])
            ->expectsOutput('Erro ao importar cidades do estado '. self::ESTADO)
            ->assertFailed();

        $this->assertDatabaseMissing('cidades', [
            'nome'           => 'Acaiaca',
            'estado_sigla'   => 'MG',
            'ibge_cidade_id' => 3100401,
            'ibge_estado_id' => 31
        ]);
    }

    public function test_cidades_nao_sao_importadas_falha_requisicao_cidades_estados()
    {
        Http::fake([IbgeEndpoints::IBGE_CIDADES_UF => Http::timeout(0)]);

        $this->artisan('cidades:importar', ['estado' => self::ESTADO])
            ->expectsOutput('Erro ao importar cidades do estado '. self::ESTADO)
            ->assertFailed();

        $this->assertDatabaseMissing('cidades', [
            'nome'           => 'Acaiaca',
            'estado_sigla'   => 'MG',
            'ibge_cidade_id' => 3100401,
            'ibge_estado_id' => 31
        ]);
    }

    public function test_nao_pode_importar_cidades_mesmo_estado_duas_vezes()
    {
        $this->artisan('cidades:importar', ['estado' => self::ESTADO])
            ->expectsOutput('Importando cidades do estado '. self::ESTADO .'...')
            ->expectsOutput('Cidades importadas com sucesso!')
            ->assertSuccessful();

        $this->assertDatabaseHas('cidades', [
            'nome'           => 'Acaiaca',
            'estado_sigla'   => 'MG',
            'ibge_cidade_id' => 3100401,
            'ibge_estado_id' => 31
        ]);

        $this->artisan('cidades:importar', ['estado' => self::ESTADO])
            ->expectsOutput('Erro ao importar cidades do estado '. self::ESTADO)
            ->expectsOutput('Cidades do estado ' . self::ESTADO . ', já existem no banco de dados.')
            ->assertFailed();
    }
}
