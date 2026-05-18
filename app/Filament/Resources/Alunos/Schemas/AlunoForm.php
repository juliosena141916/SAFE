<?php

namespace App\Filament\Resources\Alunos\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class AlunoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                TextInput::make('nome')
                    ->label('Nome')
                    ->required(),

                TextInput::make('matricula')
                    ->label('Matrícula')
                    ->required(),

                TextInput::make('turma')
                    ->label('Turma')
                    ->required(),

            ]);
    }
}