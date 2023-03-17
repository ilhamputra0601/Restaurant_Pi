<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Food;
use App\Models\User;
use App\Models\Chef;
use App\Models\Cart;
use App\Models\Order;

class HomeController extends Controller
{
    public function index()
    {
        $foods = Food::all();
        $chefs=Chef::all();
        return view('home',compact('foods','chefs',));
    }

    public function redirects()
    {
        $foods = Food::all();
        $chefs=Chef::all();
        $usertype = Auth::user()->usertype;
        if($usertype == '1') {
            $data=user::all();
            return view('admin.users',(compact("data")));
        } else {
            $user_id=Auth::id();
            $count=Cart::where('user_id',$user_id)->count();
            return view('home',compact('foods','chefs','count'));
        }
    }

    public function addcart(Request $request, $id)
    {
        if (Auth::id()) {

            $user_id=Auth::id();
            $food_id=$id;
            $quantity=$request->input('quantity');

            $data = [
                'user_id' => $user_id,
                'food_id' => $food_id,
                'quantity' => $quantity,
            ];

            Cart::create($data);
            return redirect()->back()->with('success','New cart has been added!');
        }else{
            return redirect('/login');
        }
    }

    public function showcart(Request $request, $id)
    {
            $count = Cart::where('user_id',$id)->count();
            $data = Cart::where('user_id',$id)->join('food', 'carts.food_id', '=' ,'food.id')->get();
            $data2 = Cart::select('*')->where('user_id','=', $id)->get();

            return view('showcart',compact('count','data','data2'));
    }

    public function deletecart($id)
    {
        $data=Cart::find($id);
        $data->delete();
        return redirect()->back()->with('success','Cart has been Deleted!');
    }

    public function orderconfirm(Request $request)
    {
        // dd($request);
    foreach($request->foodname as $key => $foodname)
    {
        if (!is_null($foodname)) {
            $data = new order;
            $data->foodname = $foodname;
            $data->price = $request->price[$key];
            $data->quantity= $request->quantity[$key];
            $data->name = $request->name;
            $data->phone = $request->phone;
            $data->address = $request->address;
            $data->save();
        }
    }

    return redirect()->back()->with('success','New order has been added!');
}
}
