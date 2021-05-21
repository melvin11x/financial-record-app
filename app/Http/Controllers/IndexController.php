<?php

namespace App\Http\Controllers;

class IndexController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }
}
