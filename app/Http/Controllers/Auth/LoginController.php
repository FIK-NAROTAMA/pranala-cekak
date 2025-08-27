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
            // Generate a random token
            $token = bin2hex(random_bytes(16));
            // Simpan token ke kolom cookies_token
            $user = auth()->user();
            $user->cookies_token = $token;
            $user->save();

            // Authentication passed...
            dd ('Login successful. Redirecting... to ' . $this->redirectTo . ' with token ' . $token);
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

//        return back()->withErrors([
//            'email' => 'The provided credentials do not match our records.',
//        ]);

    }
}
