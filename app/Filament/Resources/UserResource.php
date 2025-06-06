<?php

namespace App\Filament\Resources;

use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Hash;
use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers\ReferralsRelationManager;



class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationGroup = 'User Management';

    public static function getRelations(): array
    {
        return [
            ReferralsRelationManager::class,
        ];
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Name')
                    ->required()
                    ->maxLength(255),

                TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->required()
                    ->maxLength(255),

                TextInput::make('password')
                    ->label('Password')
                    ->password()
                    ->maxLength(255)
                    ->dehydrateStateUsing(fn($state) => !empty($state) ? Hash::make($state) : null)
                    ->dehydrated(fn($state) => filled($state))
                    ->required(fn(string $context): bool => $context === 'create'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable(),
                TextColumn::make('name')->label('Name')->searchable(),
                TextColumn::make('email')->label('Email')->searchable(),
                TextColumn::make('created_at')->label('Registered Date')->dateTime('Y/m/d')->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make()->label('show'),
                Tables\Actions\EditAction::make()->label('Edit'),
                Tables\Actions\DeleteAction::make()->label('Delete'),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make()->label('Group Delete'),
            ]);
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
