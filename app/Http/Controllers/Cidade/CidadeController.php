<?php

namespace App\Http\Controllers\Cidade;

use App\Models\Cidade;
use App\Http\Controllers\Controller;
use App\Http\Resources\Cidade\CidadeResource;

class CidadeController extends Controller
{
     /**
     * Listar cidades
     *
     * Retonar todos os registros do banco
     * @group Cidade
     * @responseFile response/cidade/Listar.json
     */
    public function index()
    {
        return CidadeResource::collection(Cidade::all());
    }
}
