<?php

namespace App\Filament\Resources\Movimentacaos;

use App\Filament\Resources\Movimentacaos\Pages\CreateMovimentacao;
use App\Filament\Resources\Movimentacaos\Pages\EditMovimentacao;
use App\Filament\Resources\Movimentacaos\Pages\ListMovimentacaos;
use App\Filament\Resources\Movimentacaos\Schemas\MovimentacaoForm;
use App\Filament\Resources\Movimentacaos\Tables\MovimentacaosTable;
use App\Models\Movimentacao;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;

class MovimentacaoResource extends Resource
{
    protected static ?string $model = Movimentacao::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Movimentacao';

    public static function form(Schema $schema): Schema
    {
        return MovimentacaoForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            TextColumn::make('id')
                ->label('ID')
                ->sortable(),

            TextColumn::make('aluno.nome')
                ->label('Aluno')
                ->searchable(),

            TextColumn::make('tipo')
                ->label('Tipo')
                ->badge(),

            TextColumn::make('motivo')
                ->label('Motivo')
                ->limit(30),

            TextColumn::make('responsavel')
                ->label('Responsável'),

            IconColumn::make('status_portaria')
                ->label('Portaria')
                ->boolean(),

            TextColumn::make('horario')
                ->label('Horário')
                ->dateTime('d/m/Y H:i'),
        ])

        ->actions([
            \Filament\Actions\EditAction::make(),

            \Filament\Actions\DeleteAction::make()
                ->requiresConfirmation(),
        ])

        ->bulkActions([
            \Filament\Actions\DeleteBulkAction::make()
                ->requiresConfirmation(),
        ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListMovimentacaos::route('/'),
            'create' => CreateMovimentacao::route('/create'),
            'edit' => EditMovimentacao::route('/{record}/edit'),
        ];
    }
}
