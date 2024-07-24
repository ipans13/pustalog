<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    public function Register(){
        return view('auth.register');
    }

    public function actionregister (Request $request){
        $user = User::Create([
            'email' => $request->email,
            'name' => $request->name,
            'password' => Hash::make($request->password)
        ]);
        Session::flash('message', 'Register Berhasil. Silahkan Login');
        return redirect('register');
    }
}
