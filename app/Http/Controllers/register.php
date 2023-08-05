<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class register extends Controller
{
    //
    public function register(){
        return view('register',[
            'title' => 'Sign in/ Register'
        ]);
    }
}
