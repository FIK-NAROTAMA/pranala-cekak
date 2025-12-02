<?php

namespace App\Http\Controllers\Dashboards;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        // Retrieve the token from the cookie
        $token = $request->cookie('auth_token');
        // You can use the token as needed, for example, to verify the user's session
        // For demonstration, we'll just pass it to the view (if needed)
        // return view('dashboard', ['token' => $token]);
        // For now, we'll just dump the token value
        //dd('Dashboard accessed with token: ' . $token);
        if (!$token) {
            $request->session()->invalidate();       // Hapus semua data session
            $request->session()->regenerateToken();
            // If the token is not present, redirect to login page
            return redirect(route('login'));
        }
        $user = Users::where('cookies_token', $token)->first();
        if (!$user) {
            $request->session()->invalidate();       // Hapus semua data session
            $request->session()->regenerateToken();
            return redirect(route('login'));
        }

        // If the token is present, proceed to show the dashboard
        // You can add additional logic here to verify the token if necessary
        // For now, we'll just display the dashboard
        //return view('dashboard');
        return view('dashboard.index');
//        return ('valid token: ' . $token . ' for user ' . $user->email);
    }
}
