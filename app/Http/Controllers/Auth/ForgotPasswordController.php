<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ForgotPasswordRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    public function __invoke(ForgotPasswordRequest $request)
    {
        $input = $request->validated();

        $user = User::query()
            ->whereEmail($input['email'])
            ->first();

        // exception !$user
        if (!$user) {
            return 'Não tem usuário';
        }

        $user->resetPasswordTokens()->create([
            'token' => Str::upper(Str::random(6)),
        ]);

        dd($user->toArray());
    }
}
