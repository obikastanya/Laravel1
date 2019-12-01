<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Request as SymfonyRequest;

class visitor extends Controller
{
    public function landing()
    {
        $data = DB::table('tb_faq')->get();
        return view('landing', ['faq' => $data]);
    }
}
