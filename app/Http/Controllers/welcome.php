<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class welcome extends Controller
{
    public function index()
    {
        $data = DB::table('tb_faq')->get();
        return view('welcome', ['faq' => $data]);
    }
}
