<?php

namespace App\Http\Controllers\admin\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    
    protected $redirectTo='/Admin/dashboard';

    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }
    public function loginPage()
    {
        return view('admin.auth.login');
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
        return redirect()->route('admin.logins');
    }
    protected function guard()
    {
        return Auth::guard('admin');
    }
}
