<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'firstname'=>['required','string'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique(User::class),],
            'adresse'=>['sometimes'],
            'tel'=>['sometimes'],
            'profil_id'=>['required','integer'],
            'password' => $this->passwordRules(),
        ])->validate();

        return User::create([
            'profil_id'=>$input['profil_id'],
            'name' => $input['name'],
            'firstname'=>$input['firstname'],
            'email' => $input['email'],
            'adresse'=>$input['adresse'],
            'tel'=>$input['tel'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
