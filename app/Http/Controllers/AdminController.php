<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function loginAdmin()
    {
//        check account
<<<<<<< HEAD
        if (auth()->check()){
            return redirect()->to('home');
        }
=======
//        if (auth()->check()){
//            return redirect()->to('home');
//        }
>>>>>>> b31eaf06f0877fbd3c1a62a2673b8b2b518267e7
        return view('login');
    }

    public function postLoginAdmin(Request $request)
    {
        $remember = $request->has('remember_me') ? true : false;
        if (auth()->attempt([
            'email'=>$request->email,
            'password'=>$request->password
        ],$remember)){
            return redirect()->to('home');
        }
//        dd($request->all());
    }
}
