<?php

namespace Tests\Feature\Endereco;

use Tests\TestCase;
use App\Models\Endereco;

class DestroyTest extends TestCase
{
    private const ESTADO = 'MG';
    private const ENDPOINT = 'enderecos.destroy';

    public function test_pode_excluir_endereco_com_sucesso()
    {
        $this->artisan('cidades:importar', ['estado' => self::ESTADO])
            ->expectsOutput('Importando cidades do estado ' . self::ESTADO . '...')
            ->expectsOutput('Cidades importadas com sucesso!')
            ->assertSuccessful();

        $endereco = Endereco::factory()->create();

        $response = $this->deleteJson(route(self::ENDPOINT, ['endereco' => $endereco]));

        $response->assertStatus(204);
    }

    public function test_nao_pode_excluir_endereco_que_nao_existe()
    {
        $response = $this->deleteJson(route(self::ENDPOINT, ['endereco' => 1]));

        $response->assertStatus(404);
    }
}
