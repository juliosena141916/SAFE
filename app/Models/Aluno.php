<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Aluno extends Model
{
    protected $fillable = [
        'nome',
        'matricula',
        'turma',
    ];

    public function movimentacoes(): HasMany
    {
        return $this->hasMany(Movimentacao::class);
    }
}