<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;


    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */

   /* protected function redirectTo()
    {

     if (Auth::user()->isAdmin()){

        return '/admin';
    }
    return '/';
}*/
     protected function redirectTo()
    {

        if (Auth::user()->isAdmin()){

            return '/admin';
        }
        return '/';

        //return '/admin';
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        /*dd(env('MAIL_HOST'));*/
        $this->middleware('guest');
    }
}
