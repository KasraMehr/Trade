<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InvestmentResource\Pages;
use App\Models\Investment;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class InvestmentResource extends Resource
{
    protected static ?string $model = Investment::class;

    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';

    protected static ?string $navigationLabel = 'Investments';

    protected static ?string $navigationGroup = 'Finance';

    protected static ?string $pluralLabel = 'Investments';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->label('User')
                    ->relationship('user', 'name')
                    ->required()
                    ->searchable(),
                Forms\Components\TextInput::make('principal')
                    ->label('Principal Amount')
                    ->numeric()
                    ->required()
                    ->prefix('$')
                    ->minValue(0),
                Forms\Components\TextInput::make('current_amount')
                    ->label('Current Amount')
                    ->numeric()
                    ->required()
                    ->prefix('$')
                    ->minValue(0),
                Forms\Components\TextInput::make('interest_rate')
                    ->label('Daily Interest Rate (%)')
                    ->numeric()
                    ->required()
                    ->minValue(0)
                    ->maxValue(100),
                Forms\Components\Select::make('plan')
                    ->label('Plan')
                    ->options(array_map(
                        fn ($plan) => $plan['name'],
                        config('investment_plans.plans')
                    ))
                    ->required(),
                Forms\Components\DateTimePicker::make('started_at')
                    ->label('Start Date')
                    ->required(),
                Forms\Components\DateTimePicker::make('last_compounded_at')
                    ->label('Last Compounded At')
                    ->nullable(),
                Forms\Components\Select::make('status')
                    ->label('Status')
                    ->options([
                        'active' => 'Active',
                        'completed' => 'Completed',
                        'cancelled' => 'Cancelled',
                    ])
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label('User')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('principal')
                    ->label('Principal')
                    ->money('usd')
                    ->sortable(),
                Tables\Columns\TextColumn::make('current_amount')
                    ->label('Current')
                    ->money('usd')
                    ->sortable(),
                Tables\Columns\TextColumn::make('profit')
                    ->label('Profit')
                    ->money('usd')
                    ->getStateUsing(fn ($record) => $record->current_amount - $record->principal),
                Tables\Columns\TextColumn::make('interest_rate')
                    ->label('Interest Rate (%)')
                    ->sortable(),
                Tables\Columns\TextColumn::make('plan')
                    ->label('Plan')
                    ->formatStateUsing(fn ($state) => config('investment_plans.plans.' . $state)['name'] ?? $state)
                    ->sortable(),
                Tables\Columns\TextColumn::make('started_at')
                    ->label('Start Date')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('last_compounded_at')
                    ->label('Last Compounded')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->colors([
                        'success' => 'active',
                        'info' => 'completed',
                        'danger' => 'cancelled',
                    ])
                    ->formatStateUsing(fn ($state) => match ($state) {
                        'active' => 'Active',
                        'completed' => 'Completed',
                        'cancelled' => 'Cancelled',
                    }),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->label('Status')
                    ->options([
                        'active' => 'Active',
                        'completed' => 'Completed',
                        'cancelled' => 'Cancelled',
                    ]),
                Tables\Filters\SelectFilter::make('plan')
                    ->label('Plan')
                    ->options(array_map(
                        fn ($plan) => $plan['name'],
                        config('investment_plans.plans')
                    )),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            // You can add related resources like BalanceLog here
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListInvestments::route('/'),
            'create' => Pages\CreateInvestment::route('/create'),
            'edit' => Pages\EditInvestment::route('/{record}/edit'),
        ];
    }
}
