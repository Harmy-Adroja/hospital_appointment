<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Validation\Rule;
use Laravel\Jetstream\Jetstream;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Illuminate\Validation\Rules\Password;

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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'regex:/^\d{10}$/'],
            'address' => ['required', 'string', 'max:255'],
            'password' => $this->passwordRules(),
            // 'usertype' => ['required', 'integer'],
            // 'roles' => [
            //     Rule::requiredIf(function () use ($input) {
            //         // print_r($input);
            //         // exit(0);
            //         // return $input['usertype'] == 1; // Only required if user type is admin
            //         // return strpos($input['email'], '@hospital.com') !== false;
            //     }),
            //     'array',
            //     Rule::in(Role::pluck('name')->toArray()),
            // ],
            
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

         $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'phone' => $input['phone'],
            'address' => $input['address'],
            'password' => Hash::make($input['password']),
            'usertype' => 0,
            // 'roles' => json_encode($input['roles']),
        ]);

        

         // Assign roles to the user if user type is 

        //  if (strpos($input['email'], '@hospital.com') !== false) {
        //     if ($input['usertype'] == 1) {
        //     $user->assignRoles($input['roles']);
        // }

        return $user;
    }
}


