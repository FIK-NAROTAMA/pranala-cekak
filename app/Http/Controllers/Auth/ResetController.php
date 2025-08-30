<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Users;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class ResetController extends Controller
{
    use AuthenticatesUsers;
    public function __construct()
    {
    }

    public function showResetForm(Request $request)
    {
        $url = $request->fullUrl();
        $titleFunction = 'Reset Password';
        return view('auth.reset', compact('url', 'titleFunction'));
    }

    public function reset(Request $request)
    {
        //$url = $request->fullUrl();
        $url = config('app.url');
        $titleFunction = 'Reset Password';

        $email = $request->input('email');
        $user = Users::where('email', $request->input('email'))->first();
        if ($user) {
            $user->forgot_token = bin2hex(random_bytes(16));
            $user->forgot_token_expired = now()->addMinutes(60);
            $user->save();
            // Email ditemukan
            //dd('Email ditemukan: ' . $email . ' token: ' . $user->forgot_token . ' expired: ' . $user->forgot_token_expired);
        }
        return view('auth.resetmessage', compact('url', 'titleFunction'));
    }

    public function newPasswordForm(Request $request, $token)
    {
        //$url = $request->fullUrl();
        $url = config('app.url');
        $titleFunction = 'Reset Password';
        $user = Users::where('forgot_token', $token)
            ->where('forgot_token_expired', '>', now())
            ->first();
        if ($user)
        {
            $user->forgot_token_expired = now();
            $user->save();
            $pesanKesalahan = "";
            return view('auth.newpassword', compact('url', 'titleFunction', 'pesanKesalahan', 'token'));
        }
        else
        {
            return view('auth.notoken', compact('url', 'titleFunction'));
        }
    }

    public function newpassword(Request $request)
    {
        $password = $request->password;
        $password_check = $request->password_check;
        $token = $request->token;
        $url = config('app.url');
        $titleFunction = 'Reset Password';
        $user = Users::where('forgot_token', $token)
            ->first();
        if ($password !== $password_check)
        {
            dd('Password: ' . $password . ' dan Konfirmasi Password ' . $password_check . 'tidak sesuai. Silakan ulangi.');
            return view('auth.notoken', compact('url', 'titleFunction'));
        }

        if ($user)
        {
            $user->password = bcrypt($password);
            $user->cookies_token = null;
            $user->forgot_token = null;
            $user->forgot_token_expired = null;
            $user->save();
            $pesanKesalahan = "";
//            dd('Password berhasil diubah. Silakan login dengan password baru.');
            return view('auth.sukseschangepassword', compact('url', 'titleFunction', 'pesanKesalahan', 'token'));
        }
        else
        {
            return view('auth.notoken', compact('url', 'titleFunction'));
        }
    }
}
