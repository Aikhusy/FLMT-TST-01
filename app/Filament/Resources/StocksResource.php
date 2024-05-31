<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StocksResource\Pages;
use App\Filament\Resources\StocksResource\RelationManagers;
use App\Models\Stocks;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;

class StocksResource extends Resource
{
    protected static ?string $model = Stocks::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\TextInput::make('stock_symbol')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('company_name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('quantity')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('purchase_price')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('current_price')
                    ->numeric()
                    ->nullable(),
                Forms\Components\DatePicker::make('purchase_date')
                    ->required(),
                Forms\Components\TextInput::make('market')
                    ->maxLength(255)
                    ->nullable(),
                Forms\Components\TextInput::make('sector')
                    ->maxLength(255)
                    ->nullable(),
                Forms\Components\TextInput::make('industry')
                    ->maxLength(255)
                    ->nullable(),
                Forms\Components\TextInput::make('dividend_yield')
                    ->numeric()
                    ->nullable(),
                Forms\Components\TextInput::make('earnings_per_share')
                    ->numeric()
                    ->nullable(),
                Forms\Components\TextInput::make('price_earnings_ratio')
                    ->numeric()
                    ->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('stock_symbol'),
                TextColumn::make('company_name'),
                TextColumn::make('quantity'),
                TextColumn::make('purchase_price'),
                TextColumn::make('current_price'),
                TextColumn::make('purchase_date'),
                TextColumn::make('market'),
                TextColumn::make('sector'),
                TextColumn::make('industry'),
                TextColumn::make('dividend_yield'),
                TextColumn::make('earnings_per_share'),
                TextColumn::make('price_earnings_ratio'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListStocks::route('/'),
            'create' => Pages\CreateStocks::route('/create'),
            'edit' => Pages\EditStocks::route('/{record}/edit'),
        ];
    }
}
