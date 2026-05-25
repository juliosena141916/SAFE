<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portaria extends Model
{
    protected $table = 'movimentacaos';

    protected $primaryKey = 'id';

    public $timestamps = true;

    // Campos permitidos para inserção
    protected $fillable = ['aluno_id', 'tipo', 'motivo', 'responsavel', 'horario'];
}
