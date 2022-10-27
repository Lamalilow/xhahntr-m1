<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Status;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;


class UserController extends Controller
{
    public function registrationView()
    {
        return view('user.registration');
    }
    public function registrationPost(Request $request)
    {
        $request->validate([
            'success' => 'required',
            'name' => 'required',
            'login' => 'required|unique:users',
            'password' => 'required|confirmed'
        ]);
        $request->merge(['password' => Hash::make($request->password)]);
        User::create($request->all());
        return redirect()->route('auth');
    }

    public function authorizationView()
    {
        return view('user.authorization');
    }
    public function authorizationPost(Request $request)
    {
        $request->validate([
           'login' => 'required',
           'password' => 'required',
        ]);
        if (Auth::attempt($request->only('login','password'))){
            $request->session()->regenerate();
            return redirect()->route('acc');
        }
        return back()->with(['errorLogin' => 'Ты глупый или что то?']);
    }

    public function accountView(       )
    {
        $orders = Order::where('user_id', Auth::id())->get();
        return view('user.account', compact('orders'));
    }
    public function accountPost(Request $request)
    {

    }

    public function adminView()
    {
        $statuses = Status::all();
        $orders = Order::all();
        $count = count(Order::where('status_id', 3)->get());
        return view('user.admin', compact('orders', 'statuses', 'count'));
    }

    public function adminPost(Request $request)
    {
        $request -> validate([
            'id' => 'required',
            'status_id' => 'required'
        ]);
        Order::where('id', $request->id)->update(['status_id' => $request->status_id]);
        return redirect()->route('admin');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('auth');
    }

    public function mainView()
    {
        $orders = Order::where('status_id', 1)->get();
        return view('main', compact('orders'));
    }

    public function warningView()
    {
        $img1 = './resources/assets/img/sudanelzya.jpg';
        $img2 = './resources/assets/img/sudanelzya1.jpg';
        $img3 = './resources/assets/img/sudanelzya2.jpg';
        $img4 = './resources/assets/img/sudanelzya3.jpg';
        $arr = [$img1, $img2, $img3, $img4];
        $random = Arr::random($arr);//randomly selecting 2 numbers from the numbers in the array

        return view('user.warning', compact('random'));
    }
}
