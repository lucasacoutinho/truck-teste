<?php

namespace Tests\Feature\Endereco;

use Tests\TestCase;
use App\Models\Endereco;

class IndexTest extends TestCase
{
    private const ESTADO = 'MG';
    private const ENDPOINT = 'enderecos.index';

    public function test_listagem_de_endereco_realizada_com_sucesso()
    {
        $this->artisan('cidades:importar', ['estado' => self::ESTADO])
            ->expectsOutput('Importando cidades do estado ' . self::ESTADO . '...')
            ->expectsOutput('Cidades importadas com sucesso!')
            ->assertSuccessful();

        $enderecos = Endereco::factory(10)->create();

        $response = $this->getJson(route(self::ENDPOINT));

        $response->assertJsonStructure([
            'data' => [
                [
                    'id',
                    'logradouro',
                    'numero',
                    'bairro',
                    'cidade_id',
                    'created_at',
                    'updated_at',
                ]
            ]
        ])->assertStatus(200);
    }

    public function test_listagem_de_endereco_realizada_com_sucesso_sem_enderecos_registrados()
    {
        $response = $this->getJson(route(self::ENDPOINT));

        $response->assertJsonStructure([
            'data' => []
        ])->assertStatus(200);
    }
}
