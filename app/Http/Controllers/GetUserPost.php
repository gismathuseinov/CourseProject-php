<?php

namespace App\Http\Controllers;

use App\Complaint;
use App\PostComment;
use App\User;
use Illuminate\Support\Facades\Auth;

class GetUserPost extends Controller
{
    public function complaints()
    {
        $userPosts =  Complaint::where('user_id', Auth::id())->get();
        return view('template.dashboard-applied',compact('userPosts'));

    }

    public function index()
    {
        $user = User::select('name', 'email')->where('id', Auth::id())->get();
        $userPostCount = Complaint::where('user_id', Auth::id())->get()->count();
        $userCommentCount = PostComment::where('user_id', Auth::id())->get()->count();

        return view('template.dashboard',compact(['user','userPostCount','userPostCount']));
    }
}
