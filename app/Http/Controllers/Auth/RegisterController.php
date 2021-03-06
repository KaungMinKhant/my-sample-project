<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;


    /**
     * Where to redirect users after registration.
     *
     * @var string
     */

     protected function redirectTo()
    {

        if (Auth::user()->isAdmin()){

            return '/admin';
        }
        return '/logout';

        //return '/admin';
    }

    //protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        $data['is_subscribed'] = empty($data['is_subscribed']) ? 0 : 1;
        $data['terms'] = empty($data['terms']) ? 0 : 1;

        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'is_subscribed' => 'boolean',
            'password' => 'required|min:6|confirmed',
            'terms' => 'accepted'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        $data['is_subscribed'] = empty($data['is_subscribed']) ? 0 : 1;

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'is_subscribed' => $data['is_subscribed'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
