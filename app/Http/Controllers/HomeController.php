<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
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

    public function index(){
        if(Auth::user()->akses == 'admin'){
            return redirect()->route('admin.index');
        }
        elseif(Auth::user()->akses == 'guru'){
            return redirect()->route('guru.index');
        }
        elseif(Auth::user()->akses == 'siswa'){
            return redirect()->route('siswa.index');
        }
        else{
            return redirect()->route('error');
        }
        
    }

    
}
