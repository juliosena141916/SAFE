<?php

namespace App\Filament\Resources\Alunos;

use App\Filament\Resources\Alunos\Pages\CreateAluno;
use App\Filament\Resources\Alunos\Pages\EditAluno;
use App\Filament\Resources\Alunos\Pages\ListAlunos;
use App\Filament\Resources\Alunos\Schemas\AlunoForm;
use App\Filament\Resources\Alunos\Tables\AlunosTable;
use App\Models\Aluno;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class AlunoResource extends Resource
{
    protected static ?string $model = Aluno::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Aluno';

    public static function form(Schema $schema): Schema
    {
        return AlunoForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            TextColumn::make('id')
                ->label('ID')
                ->sortable(),

            TextColumn::make('nome')
                ->label('Nome')
                ->searchable(),

            TextColumn::make('created_at')
                ->label('Criado em')
                ->dateTime('d/m/Y'),
        ])
        ->filters([
            //
        ])
        ->actions([
            \Filament\Actions\EditAction::make(),
            \Filament\Actions\DeleteAction::make(),
        ])
        ->bulkActions([
            \Filament\Actions\DeleteBulkAction::make()
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
            'index' => ListAlunos::route('/'),
            'create' => CreateAluno::route('/create'),
            'edit' => EditAluno::route('/{record}/edit'),
        ];
    }
}
