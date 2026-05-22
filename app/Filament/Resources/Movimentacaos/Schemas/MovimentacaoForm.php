<?php

namespace App\Filament\Resources\Movimentacaos\Schemas;

use App\Models\Aluno;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;

use Filament\Schemas\Schema;

class MovimentacaoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Select::make('aluno_id')
                    ->label('Aluno')
                    ->options(
                        Aluno::pluck('nome', 'id')
                    )
                    ->searchable()
                    ->required(),

                Select::make('tipo')
                    ->label('Tipo')
                    ->options([
                        'atraso' => 'Entrada Atrasada',
                        'saida_antecipada' => 'Saída Antecipada',
                    ])
                    ->required(),

                Textarea::make('motivo')
                    ->label('Motivo')
                    ->required(),

                TextInput::make('responsavel')
                    ->label('Responsável'),

                DateTimePicker::make('horario')
                    ->label('Horário')
                    ->required(),

            ]);
    }
}