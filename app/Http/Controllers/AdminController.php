<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Bring Models
use App\Models\User;
use App\Models\Food;
use App\Models\Reservation;
use App\Models\Chef;
use App\Models\Order;

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

    public function reservation(Request $request)
    {
        $data = new reservation;

        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->guest = $request->guest;
        $data->date = $request->date;
        $data->time = $request->time;
        $data->message = $request->message;

        $data->save();

        return redirect()->back();

    }

    public function viewreservations()
    {
        $data = reservation::all();

        return view("admin.reserves", compact("data"));
    }


    public function viewchef()
    {
        $data = chef::all();

        return view('admin.chefs', compact('data'));
    }

    public function insertchef(Request $request)
    {
        $request->validate([
            'image' => 'required|mimes:jpg,png,jpeg|max:5048'
        ]);

        $newImageName = time() . '-' . $request->name . '.' . $request->image->extension();

        $request->image->move(public_path('chefimage'), $newImageName);


        $data = Chef::create([
            'name' => $request->input('name'),
            'speciality' => $request->input('speciality'),
            'image' => $newImageName,
            'instagram' => $request->input('instagram'),

        ]);

        return redirect()->back();

    }

    public function updatechef($id)
    {
        $data = chef::find($id);

        return view('admin.updatechef', compact("data"));
    }

    public function updatechefrecord(Request $request, $id)
    {
        $data = chef::find($id);

        $image = $request->image;

        $request->validate([
            'image' => 'required|mimes:jpg,png,jpeg|max:5048'
        ]);

        if ($image) {
            $newImageName = time() . '-' . $request->name . '.' . $request->image->extension();
            $request->image->move(public_path('chefimage'), $newImageName);
            $data->image = $newImageName;
        }

        $data->name = $request->name;
        $data->speciality = $request->speciality;
        $data->instagram = $request->instagram;

        $data->save();

        return redirect()->back();

    }

    public function deletechef($id)
    {
        $data = chef::find($id);
        $data->delete();

        return redirect()->back();
    }


     public function vieworders()
    {
       $data = order::all();

        return view('admin.vieworders', compact('data'));
    }



}
