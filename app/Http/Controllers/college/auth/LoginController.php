<?php

namespace App\Http\Controllers\college\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    
    protected $redirectTo='/College/dashboard';

    public function __construct()
    {
        $this->middleware('guest:college')->except('logout');
    }
    public function loginPage()
    {
        return view('college.auth.login');
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
        return redirect()->route('college.logins');
    }
    protected function guard()
    {
        return Auth::guard('college');
    }
}
