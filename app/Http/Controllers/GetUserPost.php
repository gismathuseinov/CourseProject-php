<?php

namespace App\Http\Controllers;

use App\Complaint;
use App\PostComment;
use App\User;
use Illuminate\Support\Facades\Auth;

class GetUserPost extends Controller
{
    public function getUserPost()
    {
        $user = User::find(Auth::id())->get();
        $userPosts =  Complaint::where('user_id', Auth::id())->get();
//       dd($userPosts->complaint_title);
        return view('web.account',compact(['userPosts','user']));

    }

    /*public function profile()
    {
        $user = User::select('name', 'email')->where('id', Auth::id())->get();
        $userPostCount = Complaint::where('user_id', Auth::id())->get()->count();
        $userCommentCount = PostComment::where('user_id', Auth::id())->get()->count();
        return response()->json([
            'user' => $user,
            'Post count' => $userPostCount,
            'Comment count' => $userCommentCount
        ]);
    }*/
}
