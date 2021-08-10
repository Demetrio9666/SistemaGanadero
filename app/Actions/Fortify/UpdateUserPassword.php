<?php

namespace App\Actions\Fortify;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\UpdatesUserPasswords;

class UpdateUserPassword implements UpdatesUserPasswords
{
    use PasswordValidationRules;

    /**
     * Validate and update the user's password.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    public function update($user, array $input)
    {
        Validator::make($input, [
            'current_password' => ['required'
                                                
            ],


            'password' => [$this->passwordRules(),
                                'min:8',             // must be at least 10 characters in length
                                'regex:/[a-z]/',      // must contain at least one lowercase letter
                                'regex:/[A-Z]/',      // must contain at least one uppercase letter
                                'regex:/[0-9]/',      // must contain at least one digit
                                'regex:/[@$!%*#?&]/',
            ],
            'password_confirmation'=>'required|same:password',


        ])->after(function ($validator) use ($user, $input) {
            if (! isset($input['current_password']) || ! Hash::check($input['current_password'], $user->password)) {
                $validator->errors()->add('current_password', __('La contraseña proporcionada no coincide con su contraseña actual.'));
            }
        })->validateWithBag('updatePassword');

        $user->forceFill([
            'password' => Hash::make($input['password']),
        ])->save();
    }
}
