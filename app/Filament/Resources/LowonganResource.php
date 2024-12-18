<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Lowongan;
use Filament\Forms\Form;
use App\Models\Perusahaan;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\LowonganResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\LowonganResource\RelationManagers;

class LowonganResource extends Resource
{
    protected static ?string $model = Lowongan::class;
    protected static ?string $navigationGroup = 'Admin';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\TextInput::make('judul')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('perusahaan_id')
                    ->label('Perusahaan')
                    ->options(Perusahaan::all()->pluck('nama', 'id'))
                    ->required(),
                Forms\Components\TextInput::make('lokasi')
                    ->label('Lokasi Penempatan')
                    ->required(),
                Forms\Components\Select::make('jenis_pekerjaan')
                    ->options([
                        'Full Time' => 'Full Time',
                        'Part Time' => 'Part Time',
                        'Freelance' => 'Freelance',
                    ])
                    ->required(),
                Forms\Components\TextInput::make('gaji')
                    ->required(),
                Forms\Components\DatePicker::make('tanggal_akhir')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('judul')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('perusahaan.nama')->label('Perusahaan')->sortable(),
                Tables\Columns\TextColumn::make('lokasi')->sortable(),
                Tables\Columns\TextColumn::make('jenis_pekerjaan')->sortable(),
                Tables\Columns\TextColumn::make('gaji')->sortable(),
                Tables\Columns\TextColumn::make('tanggal_akhir')->sortable(),
                
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListLowongans::route('/'),
            'create' => Pages\CreateLowongan::route('/create'),
            'edit' => Pages\EditLowongan::route('/{record}/edit'),
        ];
    }
}
