<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\VerifyEmailRequest;
use App\Models\User;
use Illuminate\Http\Request;

class VerifyEmailController extends Controller
{
    /**
     * @param VerifyEmailRequest $request
     * @return void
     */
    public function __invoke(VerifyEmailRequest $request): void
    {
        $input = $request->validated();

        $user = User::query()
            ->whereToken($input['token'])
            ->first();

        $user->email_verified_at = now();
        $user->save();
    }
}
