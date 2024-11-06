<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Models\Order;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-s-inbox';
    protected static ?string $navigationLabel = 'Pedidos';
    protected static ?string $modelLabel = 'Pedido';

    protected static ?string $pluralModelLabel = 'Pedidos';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\DateTimePicker::make('date')
                    ->label('Fecha')    
                    ->required(),
                Forms\Components\TextInput::make('order_code')
                    ->required()
                    ->unique()
                    ->label('Código de pedido'),
                Forms\Components\TextInput::make('total')
                    ->required()
                    ->numeric()
                    ->label('Total'),
                Forms\Components\Select::make('idUser')
                    ->searchable()
                    ->required()
                    ->label('Usuario')
                    ->relationship('user', 'name'),
                Forms\Components\Select::make('idStatus')
                    ->searchable()
                    ->required()
                    ->label('Estado')
                    ->relationship('status', 'name'),
                Forms\Components\Select::make('idPaymentMethod')
                    ->searchable()
                    ->required()
                    ->label('Método de pago')
                    ->relationship('paymentMethod', 'name'),
                Forms\Components\DateTimePicker::make('payment_date')
                    ->required()
                    ->label('Fecha de pago'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('order_code')
                    ->searchable()
                    ->label('Código de pedido')
                    ->sortable(),
                Tables\Columns\TextColumn::make('date')
                    ->dateTime()
                    ->label('Fecha')
                    ->sortable(),
                Tables\Columns\TextColumn::make('total')
                    ->numeric()
                    ->label('Total')
                    ->sortable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->searchable()
                    ->label('Usuario')
                    ->sortable(),
                Tables\Columns\TextColumn::make('status.name')
                    ->searchable()
                    ->label('Estado')
                    ->sortable(),
                Tables\Columns\TextColumn::make('paymentMethod.name')
                    ->label('Método de pago')
                    ->sortable(),
                Tables\Columns\TextColumn::make('payment_date')
                    ->dateTime()
                    ->label('Fecha de pago')
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->label('Creado')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->label('Actualizado')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('idUser')
                    ->relationship('user', 'name')
                    ->label('Usuario')
                    ->searchable(),
                Tables\Filters\SelectFilter::make('idStatus')
                    ->relationship('status', 'name')
                    ->label('Estado')
                    ->searchable(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
