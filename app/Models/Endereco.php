<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Endereco extends Model
{
    use HasFactory;

    protected $table = 'enderecos';

    protected $fillable = [
        'logradouro',
        'numero',
        'bairro',
        'cidade_id'
    ];

    protected $casts = [
        'numero' => 'string'
    ];

    public function cidade(): BelongsTo
    {
        return $this->belongsTo(Cidade::class, 'cidade_id');
    }
}
