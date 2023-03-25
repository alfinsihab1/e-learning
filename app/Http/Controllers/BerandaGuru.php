<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BerandaGuru extends Controller
{
    public function index(){
        return view('guru.index');
    }
}
