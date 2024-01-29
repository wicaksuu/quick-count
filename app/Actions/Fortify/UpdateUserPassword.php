<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\UpdatesUserPasswords;
use Masmerise\Toaster\Toaster;

class UpdateUserPassword implements UpdatesUserPasswords
{
    use PasswordValidationRules;

    /**
     * Validate and update the user's password.
     *
     * @param  array<string, string>  $input
     */
    public function update(User $user, array $input): void
    {
        Validator::make($input, [
            'current_password' => ['required', 'string', 'current_password:web'],
            'password' => $this->passwordRules(),
        ], [
            'current_password.current_password' => __('The provided password does not match your current password.'),
        ])->validateWithBag('updatePassword');

            if ($user->is_dumy == true) {
                $user->forceFill([
                    'password' => Hash::make($input['password']),
                    'is_dumy' => false,
                    'password_dumy' =>null
                ])->save();
            }else {
                $user->forceFill([
                    'password' => Hash::make($input['password']),
                ])->save();
            }
    }
}
