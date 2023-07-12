<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Food;
use App\Models\User;
use App\Models\Chef;
use App\Models\Cart;
use App\Models\Bank;
use App\Models\Order;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Midtrans\Config;



class HomeController extends Controller
{
    public function index()
    {
        if(Auth::id()){
            return redirect('redirects');
        }else{
        $categories = Category::all();
        $foods = Food::latest()->filter(request(['category']))->get();
        $chefs = Chef::all();
        return view('home',compact('foods','chefs','categories'));
        }
    }

    public function redirects()
    {
        $categories = Category::all();
        $foods = Food::all();
        $chefs=Chef::all();
        $usertype = Auth::user()->usertype;
        if($usertype == '1') {
            $data=user::all();
            if (request('category')) {
                $category = Category::firstWhere('name',request('category'));
            }

            return view('admin.users',(compact('data','categories')));
        } else {
            $user_id=Auth::id();
            $foods = Food::latest()->filter(request(['category']))->get();
            $count=Cart::where('user_id',$user_id)->count();
            $count_p = Order::where('user_id',$user_id)->count();
            return view('home',compact('foods','chefs','count','count_p','categories'));
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
            return redirect('redirects/#menu')->with('success','New cart has been added!');
        }else{
            return redirect('/login');
        }
    }

    public function showcart(Request $request, $id)
    {
        if (Auth::id()==$id) {
            $count_p = Order::where('user_id',$id)->count();
            $count = Cart::where('user_id',$id)->count();
            $data2 = Cart::select('*')->where('user_id','=', $id)->get();
            $data = cart::where('user_id',$id)->get();

            $totalPrice = DB::table('carts')
              ->join('food', 'carts.food_id', '=', 'food.id')
              ->where('user_id', $id)
              ->sum(DB::raw('price * quantity'));

            return view('showcart',compact('count','count_p','data','data2','totalPrice'));
        } else {
            return redirect()->back();
        }


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
        $user_id=Auth::id();
        foreach($request->foodname as $key => $foodname)
        {

        if (!is_null($foodname)) {
            $data = [
            'foodname' => $foodname,
            'price' => $request->price[$key],
            'quantity'=> $request->quantity[$key],
            'user_id' => $user_id,
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            ];
        }
        // dd($data);
        $order = Order::create($data);
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('app.server_key');
        // Set to Development/Sandbox Environment (default). Set tois_ true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = config('app.is_production');
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;


        $params = array(
            'transaction_details' => array(
                'order_id' => $order->id,
                'gross_amount' => $order->price,
            ),
            'customer_details' => array(
                'first_name' => $request->name,
                'last_name' => '',
                'phone' => $request->phone,
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);
            // Update the order with snapToken
            // dd($snapToken);
            $order->snapToken = $snapToken;
            $order->save();

        return redirect()->back()->with('success','Cart has been Added!');
    }

    return redirect()->back()->with('success','New order has been added!');
    }

    public function showpay(Request $request, $id)
    {
    if (Auth::id()==$id) {

        $user_id = Auth::id();
        $count = Cart::where('user_id',$user_id)->count();
        $count_p = Order::where('user_id',$user_id)->count();
        $data = Order::where('user_id', $user_id)->get();
        return view('showpay',compact('count','count_p','data'));
    } else {
        return redirect()->back();
    }

    }

    public function deletepay($id)
    {
        $data=Order::find($id);
        $data->delete();
        return redirect()->back()->with('success','Cart has been Deleted!');
    }

    public function callback(Request $request)
    {
        $serverKey = config('app.server_key');
        $hashed = hash("sha512", $request->order_id . $request->status_code . $request->gross_amount . $serverKey);
        if ($hashed == $request->signature_key) {
        if ($request->transaction_status == 'capture' || $request->transaction_status == 'settlement') {
        $order = Order::find($request->order_id);

        if ($order) {
            $order->paid = true;
            $order->save();
        }

    }
        }
    }

}
