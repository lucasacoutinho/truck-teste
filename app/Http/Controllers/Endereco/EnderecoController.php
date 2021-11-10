<?php

namespace App\Http\Controllers\Endereco;

use App\Models\Endereco;
use App\Http\Controllers\Controller;
use App\Http\Resources\Endereco\EnderecoResource;
use App\Http\Requests\Endereco\EnderecoStoreRequest;
use App\Http\Requests\Endereco\EnderecoUpdateRequest;

class EnderecoController extends Controller
{
    /**
     * Listar endereços
     *
     * Retonar todos os registros do banco
     * @group Endereço
     * @responseFile response/endereco/Listar.json
     */
    public function index()
    {
        return EnderecoResource::collection(Endereco::all());
    }

    /**
     * Criar endereço
     *
     * Cria uma novo endereço
     * @group Endereço
     * @responseFile 201 response/endereco/Detalhar.json
     * @responseFile 422 response/endereco/ValidarCriar.json
     */
    public function store(EnderecoStoreRequest $request)
    {
        return (new EnderecoResource(Endereco::create($request->validated())))->response()->setStatusCode(201);
    }

    /**
     * Detalhar endereço
     *
     * Retorna os dados do endereço
     * @group Endereço
     * @urlParam id integer required O id do endereço
     * @responseFile response/endereco/Detalhar.json
     * @response 404 {"message": "No query results for model [App\\Models\\Endereco] 3"}
     */
    public function show(Endereco $endereco)
    {
        return (new EnderecoResource($endereco))->response()->setStatusCode(200);
    }

    /**
     * Atualizar endereço
     *
     * Atualiza os dados do endereço
     * @group Endereço
     * @urlParam id integer required O id do endereço
     * @responseFile response/endereco/Detalhar.json
     * @responseFile 422 response/endereco/ValidarAtualizar.json
     * @response 404 {"message": "No query results for model [App\\Models\\Endereco] 3"}
     */
    public function update(EnderecoUpdateRequest $request, Endereco $endereco)
    {
        $endereco->update($request->validated());

        return (new EnderecoResource($endereco))->response()->setStatusCode(200);
    }

    /**
     * Excluir endereço
     *
     * Excluir um endereço
     * @group Endereço
     * @urlParam id integer required O id do endereço
     * @response 204
     * @response 404 {"message": "No query results for model [App\\Models\\Endereco] 3"}
     */
    public function destroy(Endereco $endereco)
    {
        $endereco->delete();

        return response()->json(null, 204);
    }
}
