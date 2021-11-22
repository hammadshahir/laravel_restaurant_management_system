<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function redirects()
    {
        $user_type = Auth::user()->user_type;
        if($user_type == '1') {
            return view('admin.index');
        } else {
            return view('home');
        }
    }
}
