<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ResetPasswordRequest;
use App\Models\PasswordResetToken;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    public function __invoke(ResetPasswordRequest $request)
    {
        $input = $request->validated();

        $token = PasswordResetToken::query()
            ->whereToken($input['token'])
            ->first();

        $user = $token->user;
        $user->password = bcrypt($input['password']);
        $user->save();
    }
}
