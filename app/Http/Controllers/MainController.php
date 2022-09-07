<?php

namespace App\Http\Controllers;

class MainController extends Controller
{
    public function index()
    {
        return view('homepage');
    }

    public function aboutUs()
    {
        return view('about');
    }
}
