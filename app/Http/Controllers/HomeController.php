<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Food;

class HomeController extends Controller
{
    public function index()
    {
        $data = food::all();
        return view('home', compact("data"));
    }

    public function redirects()
    {
        $data = food::all();
        $user_type = Auth::user()->user_type;
        if($user_type == '1') {
            return view('admin.index');
        } else {
            return view('home', compact("data"));
        }
    }

}
