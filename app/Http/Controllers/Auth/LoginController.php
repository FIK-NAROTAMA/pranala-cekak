<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    public function showLoginForm()
    {
        $url = request()->get('url', '/');
        return view('auth.login', compact('url'));
    }

    public function login(Request $request)
    {

        $credentials = $request->only('email', 'password');
        if (auth()->attempt($credentials)) {
            dd ('Login successful. Redirecting... to ' . $this->redirectTo);
            return redirect()->intended($this->redirectTo);
        }
        dd ('Login failed. Please check your credentials.');

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);

    }
}
