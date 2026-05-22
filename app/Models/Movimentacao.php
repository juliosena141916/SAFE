<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Movimentacao extends Model
{
    protected $fillable = [
        'aluno_id',
        'tipo',
        'motivo',
        'responsavel',
        'status_portaria',
        'horario',
    ];

    protected $casts = [
        'status_portaria' => 'boolean',
        'horario' => 'datetime',
    ];

    public function aluno(): BelongsTo
    {
        return $this->belongsTo(Aluno::class);
    }
}