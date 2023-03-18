<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Food;
use App\Models\Chef;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use App\Models\Reservation;
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


    // reservation

    public function viewreservation()
    {
        $data=Reservation::all();
        return view("admin.reservation",(compact("data")));
    }

    public function reservation(Request $request)
    {
        // dd($request);
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:reservations,email',
            'phone' => 'required|min:12|unique:reservations',
            'guest' => 'required|unique:reservations',
            'date' => 'required|unique:reservations',
            'time' => 'required|unique:reservations',
            'message' => 'required',
            // 'g-recaptcha-response' => 'required|captcha',

        ]);
        Reservation::create($validatedData);
        return redirect()->back()->with('success','New reservation has been added!');
    }

    public function deletereservation($id)
    {
        $data=Reservation::find($id);
        $data->delete();
        return redirect()->back()->with('success','Reservation has been Deleted!');
    }

    // Chef
    public function viewchef()
    {
        $data=Chef::all();
        return view("admin.adminchef",(compact("data")));
    }

    public function createchef(Request $request)
    {
        // dd($request);
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'speciality' => 'required',
            'image' => 'image|file|max:1024',

        ]);
        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('chef-images');
        }
        Chef::create($validatedData);
        return redirect()->back()->with('success','New chef has been added!');
    }

    public function deletechef($id)
    {
        $data=Chef::find($id);
        if($data->image){
            Storage::delete($data->image);
        }
        $data->delete();
        return redirect()->back()->with('success','chef has been Deleted!');
    }

    public function showchef($id)
    {
        $data=Chef::find($id);
        return view('admin.updatechef',compact("data"));
    }
    public function updatechef(Request $request, $id)
    {
        $data = Chef::find($id);
        $rules = [
            'name' => 'required|max:255',
            'speciality' => 'required',
            'image' => 'image|file|max:1024',
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

    public function orders(){

        $data = User::with('orders')
            ->select('users.name', 'orders.user_id as user_id', \DB::raw('SUM(orders.quantity) as total_quantity'), \DB::raw('SUM(orders.quantity * orders.price) as total_amount'))
            ->join('orders', 'users.id', '=', 'orders.user_id')
            ->groupBy('orders.user_id', 'users.name')
            ->get();

        return view("admin.orders",(compact('data')));
    }

    public function ordershow($user_id)
        {
            $quantity = Order::where('user_id', $user_id)->sum('quantity');
            $total_price = Order::where('user_id', $user_id)->sum(\DB::raw('quantity * price'));

            $data = Order::where('user_id', $user_id)->get();

            return view("admin.ordershow",(compact('data','quantity','total_price')));

    }

    public function search(Request $request){

        $search=$request->search;

        // $data=Order::where('name','Like','%'.$search.'%')->orWhere('foodname','Like','%'.$search.'%')->get();
        $data=Order::where('name','Like','%'.$search.'%')->get();

        return view("admin.orders",(compact("data")));

    }


}
