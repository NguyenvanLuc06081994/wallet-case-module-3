<?php

namespace App\Http\Controllers;

use App\User;
use App\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{

    public function showFormLogin()
    {
        return view('user.login');
    }

    public function register(Request  $request)
    {
        $user = new User();
        $wallet = new Wallet();
        $user->username = $request->username;
        $user->email =  $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        $wallet->user_id = $user->id;
        $wallet->money = 0;
        $wallet->save();
        return redirect()->route('login');
    }

    public function login(Request $request)
    {
        $data = [
            'email'=>$request->email,
            'password'=>$request->password
        ];

        if (!Auth::attempt($data)){
            Session::flash('isLogin','dang nhap khong thanh cong. tai khoan hoac mat khau khong dung');
            return redirect()->route('login');
        }
        return redirect()->route('transactions.list');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
