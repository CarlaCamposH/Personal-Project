<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = RouteServiceProvider::PHASE2;

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
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'captcha-input' => ['required', 'captcha'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'pfp' => 'data:image/jpeg;base64,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',
        
        ]);
    }
}
