<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\Users;


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
        $titleFunction = 'Login';
        $pesanKesalahan = "";
        $valueEmail = "";
        $valuePassword = "";
        return view('auth.login', compact('url', 'titleFunction', 'pesanKesalahan', 'valueEmail', 'valuePassword'));
    }

    public function showResetForm()
    {
        $url = request()->get('url', '/');
        $titleFunction = 'Reset Password';
        return view('auth.reset', compact('url', 'titleFunction'));
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (auth()->attempt($credentials)) {
            $token = bin2hex(random_bytes(16));
            $user = auth()->user();
            $user->cookies_token = $token;
            $user->save();
            $authenticatedUser = auth()->user();
            cookie()->queue('auth_token', $token, 60);  // 60 minutes
            return redirect()->intended($this->redirectTo);
        }
        else {
            $url = request()->get('url', '/');
            $titleFunction = 'Login';
            $pesanKesalahan = "<em>Credentials</em> tidak sesuai.";
            $valueEmail = $request->input('email');
            $valuePassword = $request->input('password');
            return view('auth.login', compact('url', 'titleFunction', 'pesanKesalahan', 'valueEmail', 'valuePassword'));
        }
    }

    public function logout(Request $request)
    {
        $token = $request->cookie('auth_token');
        if (!$token) {
            // If the token is not present, redirect to login page
            return redirect(route('login'));
        }
        $user = Users::where('cookies_token', $token)->first();
        if (!$user) {
            $request->session()->invalidate();       // Hapus semua data session
            $request->session()->regenerateToken();
            return redirect(route('login'));
        }
        $user->cookies_token = null;
        $user->save();
        auth()->logout();
        cookie()->queue(cookie()->forget('auth_token'));
        return redirect('/login');
    }
}
