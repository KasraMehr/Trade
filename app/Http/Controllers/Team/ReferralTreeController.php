<?php

namespace App\Http\Controllers\Team;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class ReferralTreeController extends Controller
{
    public function index()
    {
        $startReferralCode = Auth::user()->referral_code;
        $rootUser = User::where('referral_code', $startReferralCode)->select('id', 'name', 'referral_code', 'balance')->first();
        $tree = $this->buildTree($startReferralCode);

        return Inertia::render('Teams/UserReferralTree', [
            'rootUser' => $rootUser,
            'tree' => $tree,
        ]);
    }

    protected function buildTree($referralCode)
    {
        $users = User::where('referred_by', $referralCode)->select('id', 'name', 'referral_code', 'balance')->get();

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
