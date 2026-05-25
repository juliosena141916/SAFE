<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('movimentacaos', function (Blueprint $table) {

            $table->id();

            $table->foreignId('aluno_id')
                ->constrained('alunos')
                ->cascadeOnDelete();

            $table->enum('tipo', [
                'atraso',
                'saida antecipada'
            ]);

            $table->enum('faltas', [
                '0',
                '1',
                '2',
                '3',
                '4',
                '5'
            ]);

            $table->text('motivo');

            $table->string('responsavel')
                ->nullable();

            $table->timestamp('horario');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('movimentacaos');
    }
};