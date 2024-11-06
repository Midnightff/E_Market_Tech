<?php

namespace App\Filament\Resources\CategoryResource\Pages;

use App\Filament\Resources\CategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCategories extends ListRecords
{
    protected static string $resource = CategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Crear categoria')
                ->icon('heroicon-o-plus-circle')
                ->modalHeading('Crear nueva categoria')
                ->modalButton('Crear categoria')
                ->modalSubmitActionLabel('Crear')
                ->successRedirectUrl(fn () => CategoryResource::getUrl('index')),
        ];
    }
}
