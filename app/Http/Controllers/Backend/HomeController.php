<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('Backend.home');
    }

    public function dashboard()
    {
        return view('Backend.home');
    }
    
}
