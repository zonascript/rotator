<?php

namespace App\Http\Controllers\Auth;


use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

use App\Http\Requests\RegistrationRequest;
use App\Http\Requests\LoginRequest;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
    * Create a new authentication controller instance.
    *
    * @return void
    */

    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    public function getLogin()
    {
        return view('dashboard.login');
    }

    public function postLogin(LoginRequest $request)
    {
        if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']]))
        {
            return redirect()->intended('dashboard');
        }
        else
        {
            return redirect()->intended('auth/login')->with('message','Login or password incorrect !');
        }
    }

    public function getRegister()
    {
        return view('dashboard.registration');
    }

    public function postRegister(RegistrationRequest $request)
    {
         User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ]);
        return redirect('auth/login')->with('message','Your account was successfully registered');
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect('auth/login');
    }

}
