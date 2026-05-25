<?php

namespace App\Filament\Resources\Portarias;

use App\Filament\Resources\Portarias\Pages\CreatePortaria;
use App\Filament\Resources\Portarias\Pages\EditPortaria;
use App\Filament\Resources\Portarias\Pages\ListPortarias;
use App\Filament\Resources\Portarias\Pages\ViewPortaria;
use App\Filament\Resources\Portarias\Schemas\PortariaForm;
use App\Filament\Resources\Portarias\Schemas\PortariaInfolist;
use App\Filament\Resources\Portarias\Tables\PortariasTable;
use App\Models\Movimentacao;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PortariaResource extends Resource
{
    protected static ?string $model = Movimentacao::class;

    protected static ?string $navigationLabel = 'Portarias';

    protected static ?string $pluralModelLabel = 'Portarias';

    protected static ?string $modelLabel = 'Portaria';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Portaria';

    public static function form(Schema $schema): Schema
    {
        return PortariaForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return PortariaInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PortariasTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function canCreate(): bool
{
    return false; // Remove o botão "Criar"
}

public static function canEdit($record): bool
{
    return false; // Remove o botão "Editar" e bloqueia a rota de edição
}

public static function canDelete($record): bool
{
    return false; // Remove o botão "Excluir" por segurança
}

public static function canViewAny(): bool
{
    return true; // Força a aba Portaria a aparecer no menu lateral
}

    public static function getPages(): array
    {
        return [
            'index' => ListPortarias::route('/'),
            'view' => ViewPortaria::route('/{record}'),
        ];
    }
}
