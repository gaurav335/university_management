<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    
    protected $redirectTo='/';

    public function __construct()
    {
        $this->middleware('guest:web')->except('logout');
    }

    public function loginPage()
    {
        return view('student.login');
    }

    public function attemptLogin(Request $request)
    {
        return $this->guard()->attempt(
                $this->credentials($request),
                $request->filled('remember')
        );
    }
    public function logout(Request $request)
    {
         $this->guard()->logout();
        return redirect()->route('home');
    }
    protected function guard()
    {
        return Auth::guard('web');
    }
}
