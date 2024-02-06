<?php

namespace App\Http\Controllers\Auth;

use App\Exceptions\InvalidTokenException;
use App\Exceptions\UserAlreadyVerifiedException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\VerifyEmailRequest;
use App\Http\Resources\UserResource;
use App\Models\User;

class VerifyEmailController extends Controller
{
    /**
     * @param VerifyEmailRequest $request
     * @return UserResource
     * @throws InvalidTokenException
     * @throws UserAlreadyVerifiedException
     */
    public function __invoke(VerifyEmailRequest $request): UserResource
    {
        $input = $request->validated();

        $user = User::query()
            ->whereToken($input['token'])
            ->first();

        if (!$user) {
            throw new InvalidTokenException();
        }

        if ($user->email_verified_at) {
            throw new UserAlreadyVerifiedException();
        }

        $user->email_verified_at = now();
        $user->save();

        return new UserResource($user);
    }
}
