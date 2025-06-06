<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Team;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class FirstUserSeeder extends Seeder
{
    public function run(): void
    {

                  $user = User::create([
                      'name' => 'kasra',
                      'email' => 'kasramehrali3@gmail.com',
                      'password' => Hash::make('12345678'), // پسورد رو حتما تغییر بده
                      'role' => 'admin',
                      'referral_code' => '333333',
                      'referred_by' => '333333',
                  ]);

                  // ساخت تیم شخصی برای این یوزر
                  Team::create([
                      'user_id' => $user->id,
                      'name' => $user->name . "'s Team",
                      'personal_team' => true,
                  ]);
    }
}
