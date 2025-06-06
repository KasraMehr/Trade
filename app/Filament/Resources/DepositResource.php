<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DepositResource\Pages;
use App\Models\Deposit;
use App\Models\User;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;

class DepositResource extends Resource
{
    protected static ?string $model = Deposit::class;

    protected static ?string $navigationIcon = 'heroicon-o-banknotes';
    protected static ?string $navigationGroup = 'Finance';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // ------------ تغییر در فیلد انتخاب کاربر ------------
                Select::make('user_id')
                    ->label('User')
                    ->options(User::pluck('name', 'id')->toArray())  // لیست کامل کاربران
                    ->searchable()                                  // امکان جستجو هم داشته باشد
                    ->preload()                                     // هنگام بارگذاری، همه گزینه‌ها را لود کند
                    ->required(),
                // --------------------------------------------------

                TextInput::make('amount')
                    ->label('Amount')
                    ->numeric()
                    ->required(),

                Select::make('status')
                    ->label('Status')
                    ->options([
                        'pending'   => 'Pending',
                        'confirmed' => 'Confirmed',
                        'rejected'  => 'Rejected',
                    ])
                    ->required(),

                FileUpload::make('payment_proof')
                    ->label('Payment Proof')
                    ->image()
                    ->directory('payment_proofs')
                    ->visibility('private')
                    ->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')->label('User')->sortable(),
                TextColumn::make('amount')->label('Amount')->money('USD'),
                BadgeColumn::make('status')
                    ->label('Status')
                    ->colors([
                        'warning' => 'pending',
                        'success' => 'confirmed',
                        'danger'  => 'rejected',
                    ]),
                TextColumn::make('created_at')->label('Created At')->dateTime(),
            ])
            ->filters([
                //
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListDeposits::route('/'),
            'create' => Pages\CreateDeposit::route('/create'),
            'edit'   => Pages\EditDeposit::route('/{record}/edit'),
        ];
    }
}
