<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\UserResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\UserResource\RelationManagers;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->required()
                    ->email()
                    ->maxLength(255),
                Forms\Components\TextInput::make('password')
                    ->required()
                    ->password()
                    ->maxLength(255)
                    ->hiddenOn('edit'),
                Forms\Components\Select::make('category')
                    ->options([
                        'Front-End Developer' => 'Front-End Developer',
                        'Back-End Developer' => 'Back-End Developer',
                        'UI/UX Designer' => 'UI/UX Designer',
                    ])
                    ->label('Category')
                    ->required(),
                    Forms\Components\TextInput::make('phone')
                    ->label('Phone')
                    ->nullable()
                    ->maxLength(15),
                Forms\Components\TextInput::make('instagram')
                    ->label('Instagram')
                    ->nullable()
                    ->maxLength(255),
                    // Field Upload Gambar
                Forms\Components\FileUpload::make('photo')
                ->label('Photo')
                ->image()  // Hanya menerima gambar
                ->disk('public')  
                ->nullable()
                ->maxSize(1024 * 5)  // Ukuran file maksimal 5MB
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('phone'),
                Tables\Columns\TextColumn::make('category'),
                Tables\Columns\TextColumn::make('instagram'),
                Tables\Columns\ImageColumn::make('photo')->disk('public')
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
