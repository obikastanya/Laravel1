<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class login extends Controller
{
    public function tampilLogin()
    {
        // function untuk menampilkan halaman login
        return view('login');
    }
}
