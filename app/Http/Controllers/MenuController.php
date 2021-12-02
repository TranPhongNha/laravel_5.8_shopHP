<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuController extends Controller
{
    //
    public function index()
    {
        return view('menus.index');
//        dd('list menu');
    }

    public function create(){
        return view('menus.add');
    }
}
