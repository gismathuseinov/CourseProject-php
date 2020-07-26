<?php

namespace App\Http\Controllers;

use App\Comments;
use App\Feedback;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('proyekt.nice-html.ltr.index');
    }

    public function issue()
    {
        $comments = Comments::where('is_letted', 0)->paginate(6);

        return view('proyekt.nice-html.ltr.issue', compact('comments'));
    }

    public function message()
    {

        $feedback = Feedback::where('is_seen',0)->get();

        return view('proyekt.nice-html.ltr.message', compact('feedback'));
    }

    public function see(Request $request)
    {
        $id = $request->id;

        Feedback::where('id', $id)->update(['is_seen' => 1]);
    }

}

