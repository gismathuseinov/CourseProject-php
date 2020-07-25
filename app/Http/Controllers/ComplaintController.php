<?php

namespace App\Http\Controllers;

use App\Comments;
use App\User;
use App\Http\Requests\Complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ComplaintController extends Controller
{
    public function create_post(Complaint $complaint, int $user_id)
    {
        $user = User::find($user_id);
        echo($user);
    }
}
