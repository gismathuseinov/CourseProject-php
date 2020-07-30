<?php

namespace App\Http\Controllers;

use App\Complaint;
use App\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        $userCount = User::count();

        $issueCount = Complaint::where('is_letted', 1)
            ->where('is_active',1)
            ->count();

        $complaints = Complaint::where('is_letted', 1)
            ->where('is_active',1)
            ->paginate(6);

        return view('proyekt.index', compact(['userCount', 'issueCount', 'complaints']));
    }
    public function about()
    {
        return view('proyekt.about');
    }

    public function main()
    {
        return view('proyekt.goindex');
    }
    public function sikeytet()
    {
        return view('proyekt.sikayetet');
    }

    public function get_post_comments(int $post_id)
    {
        $post = Complaint::with(["comments", 'comments.user'])->findOrFail($post_id);

        return response()->json([
            'status' => 'OK',
            'comments' => $post->comments,
        ]);
    }
}

