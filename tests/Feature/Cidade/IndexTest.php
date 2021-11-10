<?php

namespace Tests\Feature\Cidade;

use Tests\TestCase;

class IndexTest extends TestCase
{
    private const ESTADO = 'MG';
    private const ESTADO_INEXISTENTE = 'CC';
    private const ENDPOINT = 'cidades.index';

    public function test_cidades_sao_listadas_com_sucesso()
    {
        $this->artisan('cidades:importar', ['estado' => self::ESTADO])
            ->expectsOutput('Importando cidades do estado '. self::ESTADO .'...')
            ->expectsOutput('Cidades importadas com sucesso!')
            ->assertSuccessful();

        $response = $this->getJson(route(self::ENDPOINT));

        $response->assertJsonStructure([
            'data' => [
                [
                    'id',
                    'nome',
                    'estado_sigla',
                    'created_at',
                    'updated_at',
                ]
            ]
        ])->assertStatus(200);
    }

    public function test_nenhuma_cidade_registrada_no_banco_de_dados()
    {
        $response = $this->getJson(route(self::ENDPOINT));

        $response->assertJsonFragment([
            'data' => []
        ])->assertStatus(200);
    }

    public function test_nenhuma_cidade_registrada_no_banco_de_dados_falha_comando()
    {
        $this->artisan('cidades:importar', ['estado' => self::ESTADO_INEXISTENTE])
            ->expectsOutput('Erro ao importar cidades do estado '. self::ESTADO_INEXISTENTE)
            ->assertFailed();

        $response = $this->getJson(route(self::ENDPOINT));

        $response->assertJsonFragment([
            'data' => []
        ])->assertStatus(200);
    }
}
