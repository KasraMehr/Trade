<?php

namespace App\Actions\Fortify;

use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
     public function create(array $input): User
     {
         Validator::make($input, [
             'name' => ['required', 'string', 'max:255'],
             'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
             'phone_number' => ['required', 'string', 'max:15', 'unique:users', 'regex:/[0-9]/'],
             'password' => $this->passwordRules(),
             'referred_by' => ['required', 'string', 'max:10', 'exists:users,referral_code'],
             'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
         ])->after(function ($validator) use ($input) {
             if (User::count() > 0 && empty($input['referred_by'])) {
                 $validator->errors()->add('referred_by', 'وارد کردن کد معرف الزامی است.');
             }
         })->validate();

         return DB::transaction(function () use ($input) {
             return tap(User::create([
                 'name' => $input['name'],
                 'email' => $input['email'],
                 'phone_number' =>$input['phone_number'],
                 'password' => Hash::make($input['password']),
                 'referred_by' => !empty($input['referred_by']) ? $input['referred_by'] : null,
             ]), function (User $user) {
                 $this->createTeam($user);
             });
         });
     }




    /**
     * Create a personal team for the user.
     */
    protected function createTeam(User $user): void
    {
        $user->ownedTeams()->save(Team::forceCreate([
            'user_id' => $user->id,
            'name' => explode(' ', $user->name, 2)[0]."'s Team",
            'personal_team' => true,
        ]));
    }
}
