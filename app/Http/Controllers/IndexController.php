<?php

namespace App\Http\Controllers;

use App\Complaint;
use App\PostComment;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        $complaints = Complaint::where('is_letted', 1)
            ->where('is_active', 1)
            ->orderBy('id', 'desc')
            ->paginate(3);


        $postsID = Complaint::select('id')->get();
        if ($postsID->count() > 5) {
            foreach ($postsID as $postID) {
                $commentsCount[] = PostComment::where('complaint_id', $postID['id'])->select('complaint_id', 'id')->get();
            }
            if (count($commentsCount[0]) !=0 && count($commentsCount[1])!=0 && count($commentsCount[2]) != 0) {
                rsort($commentsCount);
                $output = array_slice($commentsCount, 0, 3);
                foreach ($output as $key => $post) {
                    $postId = $post[$key]['complaint_id'];
                    $posts[] = Complaint::where('id', $postId)->get();
                }
                return view('web.index', compact(['complaints', 'posts']))->render();
            }

        }
        return view('web.index', compact('complaints'));
    }

    public function about()
    {
        return view('web.about');
    }

    public function main()
    {
        return view('web.welcome');
    }

    public function write()
    {
        return view('web.write');
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

