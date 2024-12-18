<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Perusahaan;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PerusahaanResource\Pages;
use App\Filament\Resources\PerusahaanResource\RelationManagers;

class PerusahaanResource extends Resource
{
    protected static ?string $model = Perusahaan::class;
    protected static ?string $navigationGroup = 'Admin';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\TextInput::make('nama')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('lokasi')
                    ->required(),

               Forms\Components\FileUpload::make('gambar')->image()->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('nama')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('lokasi')->sortable(),
                Tables\Columns\ImageColumn::make('gambar')->disk('public')->circular(),
       
            ])
            ->filters([
                //
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
            'index' => Pages\ListPerusahaans::route('/'),
            'create' => Pages\CreatePerusahaan::route('/create'),
            'edit' => Pages\EditPerusahaan::route('/{record}/edit'),
        ];
    }
}
