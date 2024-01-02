<?php

namespace App\Http\Controllers\Auth;

use App\Exceptions\InvalidAuthenticationException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Resources\UserResource;

class LoginController extends Controller
{
    /**
     * @param LoginRequest $request
     * @return UserResource
     * @throws InvalidAuthenticationException
     */
    public function __invoke(LoginRequest $request): UserResource
    {
        $input = $request->validated();

        if (!auth()->attempt($input)) {
            throw new InvalidAuthenticationException();
        }

        request()->session()->regenerate();

        return new UserResource(auth()->user());
    }
}
