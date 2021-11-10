<?php

namespace Tests\Feature\Endereco;

use Tests\TestCase;
use App\Models\Endereco;
use Illuminate\Support\Str;

class ShowTest extends TestCase
{
    private const ESTADO = 'MG';
    private const ENDPOINT = 'enderecos.show';

    public function test_pode_detalhar_endereco_com_sucesso()
    {
        $this->artisan('cidades:importar', ['estado' => self::ESTADO])
            ->expectsOutput('Importando cidades do estado ' . self::ESTADO . '...')
            ->expectsOutput('Cidades importadas com sucesso!')
            ->assertSuccessful();

        $endereco = Endereco::factory()->create();

        $response = $this->getJson(route(self::ENDPOINT, ['endereco' => $endereco]));

        $response->assertJsonFragment([
            'data' => [
                'id'          => $endereco['id'],
                'logradouro'  => $endereco['logradouro'],
                'numero'      => $endereco['numero'],
                'bairro'      => $endereco['bairro'],
                'cidade_id'   => $endereco['cidade_id'],
                'created_at'  => $endereco['created_at'],
                'updated_at'  => $endereco['updated_at'],
            ]
        ])->assertStatus(200);
    }

    public function test_nao_pode_detalhar_endereco_inexistente()
    {
        $response = $this->getJson(route(self::ENDPOINT, ['endereco' => 1]));

        $response->assertStatus(404);
    }
}
