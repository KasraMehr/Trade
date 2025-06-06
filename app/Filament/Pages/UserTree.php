<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Models\User;

class UserTree extends Page
{
    protected static ?string $title = 'Referral Tree';
    protected static string $view = 'filament.pages.user-referral-tree';

    public $tree = [];
    public $rootUser;

    public function mount()
    {
        $startReferralCode = '577662';
        $this->rootUser = User::where('referral_code', $startReferralCode)->first();
        $this->tree = $this->buildTree($startReferralCode);
    }

    protected function buildTree($referralCode)
    {
        $users = User::where('referred_by', $referralCode)->get();

        $tree = [];
        foreach ($users as $user) {
            $tree[] = [
                'user' => $user,
                'children' => $this->buildTree($user->referral_code),
            ];
        }

        return $tree;
    }
}
