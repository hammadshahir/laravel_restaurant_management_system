<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Food;

class AdminController extends Controller
{
    public function user()
    {
        $data = user::all();
        return view("admin.users", compact('data'));
    }

    public function delete($id)
    {
        $data = user::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function foodmenu()
    {
        $data = food::all();
        return view('admin.foodmenu', compact("data"));
    }

    public function insertfood(Request $request)
    {
        $request->validate([
            'image' => 'required|mimes:jpg,png,jpeg|max:5048'
        ]);

        $newImageName = time() . '-' . $request->name . '.' . $request->image->extension();

        $request->image->move(public_path('foodimages'), $newImageName);


        $data = Food::create([
            'title' => $request->input('title'),
            'price' => $request->input('price'),
            'description' => $request->input('description'),
            'image' => $newImageName

        ]);

        return redirect('/foodmenu');
    }

    public function deletemenu($id)
    {
        $data = food::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function updateview($id)
    {
        $data = food::find($id);
        return view("admin.updateview", compact("data"));

    }

    public function updatefood(Request $request, $id)
    {
        $data = food::find($id);
        $newImageName = time() . '-' . $request->name . '.' . $request->image->extension();
        $request->image->move(public_path('foodimages'), $newImageName);

        $data = Food::create([
            'title' => $id->input('title'),
            'price' => $id->input('price'),
            'description' => $id->input('description'),
            'image' => $newImageName

        ]);

        return redirect('/foodmenu');
    }

}
