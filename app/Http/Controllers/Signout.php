<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class Signout extends Controller
{
    public function exit() {
	    Auth::logout();
        return redirect('login');
    }

}

