<?php

namespace App\Filament\Resources\Portarias\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class PortariasTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('aluno_id')->searchable(),
                TextColumn::make('aluno.nome'),
                TextColumn::make('tipo'),
                TextColumn::make('faltas'),
                TextColumn::make('motivo'),
                TextColumn::make('responsavel'),
                TextColumn::make('horario')

            ])
            ->filters([
                //
            ])
            ->recordActions([
                
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
