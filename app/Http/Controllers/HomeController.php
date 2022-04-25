<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Models
use App\Models\Cart;
use App\Models\User;
use App\Models\Food;
use App\Models\Chef;
use App\Models\Order;

class HomeController extends Controller
{
    public function index()
    {
        $data = food::all();
        $chefs = chef::all();
        $user_id = Auth::id();
        $count = cart::where('user_id', $user_id)->count();
        return view('home', compact("data", "chefs", "count"));
    }

    public function redirects()
    {
        $data = food::all();
        $chefs = chef::all();
        $user_type = Auth::user()->user_type;
        if($user_type == '1') {
            return view('admin.index');
        } else {
            $user_id = Auth::id();
            $count = cart::where('user_id', $user_id)->count();

            return view('home', compact('data', 'chefs', 'count'));

        }
    }

    public function add_cart(Request $request, $id)
    {
        if(Auth::id()) {
            $user_id = Auth::id();
            $foodId = $id;
            $quantity = $request->quantity;

            $cart = new Cart();
            $cart->user_id = $user_id;
            $cart->food_id = $foodId;
            $cart->quantity = $quantity;

            $cart->save();

            return redirect()->back();
        } else {
            return redirect('/login');
        }
    }

    public function show_cart(Request $request, $id)
    {
        $count = cart::where('user_id', $id)->count();
        $data = cart::where('user_id', $id)->join('food', 'carts.food_id', '=', 'food.id')->get();
        $cartItem = cart::select('*')->where('user_id', '=', $id)->get();
        return view('showcart', compact('count', 'data', 'cartItem'));
    }

    public function remove_cart_item($id)
    {
        $data = cart::find($id);
        $data->delete();
        return redirect()->back();

    }

    public function confirm_order(Request $request)
    {
      foreach($request->foodname as $key => $foodname) {
        $data = new order;
        $data->foodname = $foodname;
        $data->price = $request->price[$key];
        $data->quantity = $request->quantity[$key];
        $data->username = $request->username;
        $data->address = $request->address;
        $data->phone = $request->phone;
        $data->save();

      }

      return redirect()->back();

    }

}
