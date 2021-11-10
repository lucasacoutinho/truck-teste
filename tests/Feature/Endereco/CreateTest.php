<?php

namespace Tests\Feature\Endereco;

use Tests\TestCase;
use App\Models\Endereco;
use Illuminate\Support\Str;

class CreateTest extends TestCase
{
    private const ESTADO = 'MG';
    private const ENDPOINT = 'enderecos.store';

    public function test_endereco_criado_com_sucesso()
    {
        $this->artisan('cidades:importar', ['estado' => self::ESTADO])
            ->expectsOutput('Importando cidades do estado ' . self::ESTADO . '...')
            ->expectsOutput('Cidades importadas com sucesso!')
            ->assertSuccessful();

        $endereco = Endereco::factory()->make()->toArray();

        $response = $this->postJson(route(self::ENDPOINT), $endereco);

        $response->assertJsonFragment([
            'data' => [
                'id'          => $response['data']['id'],
                'logradouro'  => $endereco['logradouro'],
                'numero'      => $endereco['numero'],
                'bairro'      => $endereco['bairro'],
                'cidade_id'   => $endereco['cidade_id'],
                'created_at'  => $response['data']['created_at'],
                'updated_at'  => $response['data']['updated_at'],
            ]
        ])->assertStatus(201);
    }

    public function test_nao_pode_criar_endereco_falha_cidade_nao_existe()
    {
        $endereco = [
            'logradouro'  => 'Rua Teste',
            'numero'      => '123',
            'bairro'      => 'Bairro Teste',
            'cidade_id'   => 1,
        ];

        $response = $this->postJson(route(self::ENDPOINT), $endereco);

        $response->assertJsonValidationErrors(['cidade_id'])->assertStatus(422);
    }

    public function test_nao_pode_criar_endereco_falha_campos_nao_informados()
    {
        $this->artisan('cidades:importar', ['estado' => self::ESTADO])
            ->expectsOutput('Importando cidades do estado ' . self::ESTADO . '...')
            ->expectsOutput('Cidades importadas com sucesso!')
            ->assertSuccessful();

        $endereco = [
            'logradouro'  => null,
            'numero'      => null,
            'bairro'      => null,
            'cidade_id'   => null,
        ];

        $response = $this->postJson(route(self::ENDPOINT), $endereco);

        $response->assertJsonValidationErrors(['logradouro', 'numero', 'bairro', 'cidade_id'])->assertStatus(422);
    }

    public function test_nao_pode_criar_endereco_falha_campos_quantidade_de_caracteres_maior_que_limite()
    {
        $this->artisan('cidades:importar', ['estado' => self::ESTADO])
            ->expectsOutput('Importando cidades do estado ' . self::ESTADO . '...')
            ->expectsOutput('Cidades importadas com sucesso!')
            ->assertSuccessful();

        $endereco = [
            'logradouro'  => Str::random(256),
            'numero'      => Str::random(256),
            'bairro'      => Str::random(256),
            'cidade_id'   => 1,
        ];

        $response = $this->postJson(route(self::ENDPOINT), $endereco);

        $response->assertJsonValidationErrors(['logradouro', 'numero', 'bairro'])->assertStatus(422);
    }
}
