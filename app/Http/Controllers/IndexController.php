<?php

namespace App\Http\Controllers;

use App\Complaint;
use App\PostComment;
use App\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        $complaints = Complaint::where('is_letted', 1)
            ->where('is_active', 1)
            ->orderBy('id', 'desc')
            ->take(8)
            ->get();
        $userCount = User::all()->count();
        $postCount = Complaint::where('is_letted', 1)->where('is_active', 1)->get()->count();


        $topPosts = range(1, $postCount);
        shuffle($topPosts);

        $topPosts = array_slice($topPosts, 0, 4);
        foreach ($topPosts as $key => $topPost) {
            $result[] = Complaint::find($topPost);
        }
        return view('template.index', compact(['complaints', 'userCount', 'postCount', 'result']));
    }

    public function about()
    {
        return view('template.how-it-work');
    }

    public function main()
    {
        return view('web.welcome');
    }

    public function write()
    {
        return view('template.post-job');
    }

    public function get_post_comments(int $post_id)
    {
        $post = Complaint::with(["comments", 'comments.user'])->find($post_id);
        $post->comments()->orderBy('id', 'desc')->get();

        return response()->json([
            'status' => 'OK',
            'comments' => $post->comments,
        ]);
    }


}

