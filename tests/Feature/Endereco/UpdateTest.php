<?php

namespace Tests\Feature\Endereco;

use Tests\TestCase;
use App\Models\Endereco;
use Illuminate\Support\Str;

class UpdateTest extends TestCase
{
    private const ESTADO = 'MG';
    private const ENDPOINT = 'enderecos.update';

    public function test_pode_atualizar_endereco_com_sucesso()
    {
        $this->artisan('cidades:importar', ['estado' => self::ESTADO])
            ->expectsOutput('Importando cidades do estado ' . self::ESTADO . '...')
            ->expectsOutput('Cidades importadas com sucesso!')
            ->assertSuccessful();

        $endereco = Endereco::factory()->create();
        $dados = Endereco::factory()->make()->toArray();

        $response = $this->putJson(route(self::ENDPOINT, ['endereco' => $endereco]), $dados);

        $response->assertJsonFragment([
            'data' => [
                'id'          => $endereco['id'],
                'logradouro'  => $dados['logradouro'],
                'numero'      => $dados['numero'],
                'bairro'      => $dados['bairro'],
                'cidade_id'   => $dados['cidade_id'],
                'created_at'  => $endereco['created_at'],
                'updated_at'  => $response['data']['updated_at'],
            ]
        ])->assertStatus(200);
    }

    public function test_nao_pode_atualizar_endereco_cidade_informada_inexistente()
    {
        $this->artisan('cidades:importar', ['estado' => self::ESTADO])
            ->expectsOutput('Importando cidades do estado ' . self::ESTADO . '...')
            ->expectsOutput('Cidades importadas com sucesso!')
            ->assertSuccessful();

        $endereco = Endereco::factory()->create();
        $dados = Endereco::factory()->state(['cidade_id' => 9999999])->make()->toArray();

        $response = $this->putJson(route(self::ENDPOINT, ['endereco' => $endereco]), $dados);

        $response->assertJsonValidationErrors(['cidade_id'])->assertStatus(422);
    }

    public function test_nao_pode_atualizar_endereco_dados_informados_invalidos()
    {
        $this->artisan('cidades:importar', ['estado' => self::ESTADO])
            ->expectsOutput('Importando cidades do estado ' . self::ESTADO . '...')
            ->expectsOutput('Cidades importadas com sucesso!')
            ->assertSuccessful();

        $endereco = Endereco::factory()->create();
        $dados = Endereco::factory()->state([
            'logradouro' => null,
            'numero'     => null,
            'bairro'     => null,
            'cidade_id'  => null,
        ])->make()->toArray();

        $response = $this->putJson(route(self::ENDPOINT, ['endereco' => $endereco]), $dados);

        $response->assertJsonValidationErrors(['logradouro', 'numero', 'bairro', 'cidade_id'])->assertStatus(422);
    }

    public function test_nao_pode_atualizar_endereco_dados_informados_quantidade_de_caracteres_maior_que_limite()
    {
        $this->artisan('cidades:importar', ['estado' => self::ESTADO])
            ->expectsOutput('Importando cidades do estado ' . self::ESTADO . '...')
            ->expectsOutput('Cidades importadas com sucesso!')
            ->assertSuccessful();

        $endereco = Endereco::factory()->create();
        $dados = Endereco::factory()->state([
            'logradouro' => Str::random(256),
            'numero'     => Str::random(256),
            'bairro'     => Str::random(256),
        ])->make()->toArray();

        $response = $this->putJson(route(self::ENDPOINT, ['endereco' => $endereco]), $dados);

        $response->assertJsonValidationErrors(['logradouro', 'numero', 'bairro'])->assertStatus(422);
    }

    public function test_nao_pode_atualizar_endereco_endereco_informado_inexistente()
    {
        $this->artisan('cidades:importar', ['estado' => self::ESTADO])
            ->expectsOutput('Importando cidades do estado ' . self::ESTADO . '...')
            ->expectsOutput('Cidades importadas com sucesso!')
            ->assertSuccessful();

        $dados = Endereco::factory()->make()->toArray();

        $response = $this->putJson(route(self::ENDPOINT, ['endereco' => 1]), $dados);

        $response->assertStatus(404);
    }
}
