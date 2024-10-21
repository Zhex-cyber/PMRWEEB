<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Session;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Override the username method to use NIS instead of email.
     *
     * @return string
     */
    public function username()
    {
        return 'nis';
    }

    /**
     * Handle user authentication and check for active status.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function authenticated()
    {
        if (Auth::User()->status == 'Tidak Aktif') {
            Auth::logout();
            Session::flash('error', "Akun yang kamu gunakan sudah Tidak Aktif !");
            return redirect('login');
        }
    }
}
