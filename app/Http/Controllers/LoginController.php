<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect()->route('admin');
        }else{
            return view('auth.login');
        }
    }

    public function actionlogin(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];
        $remember = $request->has('remember');
        if (Auth::attempt($data, $remember)) {
            Session::flash('success', 'Login Berhasil' . Auth::user()->name);
            return redirect()->route('admin');
        }else{
            Session::flash('error', 'Email atau Password Salah');
            return redirect('/login');
        }
    }

    public function action(Request $request){
        dd($request->all());
    }
    public function actionlogout()
    {
        Auth::logout();
        return redirect('/login');
    }
}