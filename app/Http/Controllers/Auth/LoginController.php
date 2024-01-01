<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __invoke()
    {
       $login = [
           'email' => 'test@example.com',
           'password' => 'password'
       ];

       if (auth()->attempt($login)) {
           request()->session()->regenerate();

           return auth()->user();
       }

    }
}
