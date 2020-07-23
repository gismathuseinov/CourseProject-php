<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use MongoDB\Driver\Session;

class Check extends Controller
{
    public function check(){
        $check = session()->has('users');
        if(User::find(Auth::id()))
        {
            return response()->json(['status'=>0]);
        }
        else
        {
            return response()->json(['status'=>1]);
        }



    }
}
