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
        $url = $request->fullUrl();
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

    public function newpassword(Request $request, $token)
    {
        $url = $request->fullUrl();
        $titleFunction = 'Reset Password';
        $user = Users::where('forgot_token', $token)
            ->where('forgot_token_expired', '>', now())
            ->first();
        if ($user)
        {
            $pesanKesalahan = "";
            return view('auth.newpassword', compact('url', 'titleFunction', 'pesanKesalahan'));
        }
        else
        {
            return view('auth.notoken', compact('url', 'titleFunction'));
        }
            


    }
}
