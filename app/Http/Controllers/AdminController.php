<?php

namespace App\Http\Controllers;

use App\Complaint;
use App\Feedback;
use App\Http\Requests\PostComment;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard()
    {
        $userCount = User::count();

        $unReadMessage = Feedback::where('is_seen', 0)->count();

        $newComplaint = Complaint::where('is_letted', 0)->count();

        $users = User::orderBy('id','desc')->paginate('6');

        $postTitles = Complaint::with(['comments'])->orderByDesc('id')->where('is_letted',1)->paginate(4);

        return view('proyekt.nice-html.ltr.index', compact(['userCount', 'unReadMessage', 'newComplaint','users','postTitles']));
    }

    public function issue()
    {
        $comments = Complaint::where('is_letted', 0)->paginate(6);

        return view('proyekt.nice-html.ltr.issue', compact('comments'));
    }

    public function message()
    {

        $feedback = Feedback::where('is_seen', 0)->get();

        return view('proyekt.nice-html.ltr.message', compact('feedback'));
    }

    public function see(Request $request)
    {
        $id = $request->id;

        Feedback::where('id', $id)->update(['is_seen' => 1]);
    }

}

