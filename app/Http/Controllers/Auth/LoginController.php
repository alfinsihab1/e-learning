<?php

namespace App\Http\Controllers\Auth;

use App\Models\Kelas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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

    public function authenticated(Request $request, $user){

        $user = Auth::user();
        Session::put('akses', $user->akses);

            

        if ($user->akses == 'guru'){
            return redirect()->route('guru.index');
        }
        if ($user->akses == 'admin'){
            return redirect()->route('admin.index');
        }
        elseif( $user->akses == 'siswa'){
            return redirect()->route('siswa.index');
        }
        else{
            Auth::user()->logout();
            flash('Anda tidak memiliki hak akses')->error();
            return redirect()->route('login');
        }
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect('/login');
      }
}
