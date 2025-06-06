<?php

namespace App\Filament\Resources\UserResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Columns\TextColumn;

class ReferralsRelationManager extends RelationManager
{
    protected static string $relationship = 'referrals';

    public function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('نام کاربر'),
                TextColumn::make('email')->label('ایمیل'),
                TextColumn::make('created_at')->dateTime('d M Y')->label('تاریخ عضویت'),
            ]);
    }
}
