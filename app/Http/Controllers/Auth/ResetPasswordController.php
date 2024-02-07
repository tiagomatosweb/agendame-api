<?php

namespace App\Http\Controllers\Auth;

use App\Exceptions\InvalidPasswordResetTokenException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ResetPasswordRequest;
use App\Models\PasswordResetToken;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    /**
     * @param ResetPasswordRequest $request
     * @return void
     * @throws InvalidPasswordResetTokenException
     */
    public function __invoke(ResetPasswordRequest $request): void
    {
        $input = $request->validated();

        $token = PasswordResetToken::query()
            ->whereToken($input['token'])
            ->first();

        if (!$token) {
            throw new InvalidPasswordResetTokenException();
        }

        $user = $token->user;
        $user->password = bcrypt($input['password']);
        $user->save();

        $user->resetPasswordTokens()->delete();
    }
}
