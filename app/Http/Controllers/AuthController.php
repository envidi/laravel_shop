<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Hash;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }
    public function showDangKi()
    {
        return view('auth.dang_ki');
    }
    public function login(Request $request)
    {
        // $credentials = $request->only('email', 'password');

        // if (Auth::attempt($credentials)) {
        //     dd($credentials);
        //     return redirect()->intended('/');
        // }

        // return redirect()->route('login')->with('error', 'Đăng nhập không thành công.');
         $email = $request->email;
        $password = $request->password;

        $user =DB::table('users')->where('email', '=', $email)->first();
            
        if ($user) {
            return  redirect()->route("home");
        } else {
            return redirect()->back()->with('error', 'Email does not exists');
        }

    }

    public function dang_ki(Request $request)
    {
         $email = $request->email;
        $password = $request->password;
        $user_name =$request->name;

       DB::table('users')->insert([
        'user_name' => $user_name,
    'email' => $email,
    'password' => $password,

    ]);
     return redirect()->route("login");
    }
    
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
