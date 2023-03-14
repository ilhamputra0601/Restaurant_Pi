<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Food;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    // user
    public function user()
    {
        $data=user::all();
        return view("admin.users",(compact("data")));
    }
    public function deleteuser($id)
    {
        $data=user::find($id);
        $data->delete();
        return redirect()->back()->with('success','user has been Deleted!');
    }

    // foodmenu
    public function foodmenu()
    {
        $data=Food::all();
        return view("admin.foodmenu",(compact("data")));
    }
    public function upload(Request $request)
    {
        // dd($request);
        $validatedData = $request->validate([
            'title' => 'required|max:255|unique:food',
            'price' => 'required',
            'image' => 'image|file|max:1024',
            'description' => 'required',

        ]);
        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('food-images');
        }
        Food::create($validatedData);
        return redirect()->back()->with('success','New food has been added!');
    }

    public function viewfood($id)
    {
        $data=Food::find($id);
        return view('admin.updatefood',compact("data"));
    }
    public function update(Request $request, $id)
    {
        $data = Food::find($id);
        $rules = [
            'title' => 'required|max:255',
            'price' => 'required',
            'image' => 'image|file|max:1024',
            'description' => 'required',
        ];
        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            if ($data->image) {
                Storage::delete($data->image);
            }
            $validatedData['image'] = $request->file('image')->store('food-images');
        }

        $data->update($validatedData);

        return redirect('/foodmenu')->with('success', 'Food has been updated!');
    }
    public function deletefood($id)
    {
        $data=Food::find($id);
        if($data->image){
            Storage::delete($data->image);
        }
        $data->delete();
        return redirect()->back()->with('success','food has been Deleted!');
    }
}
