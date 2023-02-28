<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class HomeController extends Controller
{
    public function dashboard(Request $request)
    {
        $pageTitle = 'داشبورد';

        return view('dashboard', compact('pageTitle'));
    }
}
