<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cidade extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'cidades';

    protected $fillable = [
        'nome',
        'estado_sigla',
        'ibge_cidade_id',
        'ibge_estado_id'
    ];
}
