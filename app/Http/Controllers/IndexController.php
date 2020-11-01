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
            ->paginate(4);
        $userCount = User::all()->count();
        $postCount = Complaint::where('is_letted', 1)->where('is_active', 1)->get()->count();

        $postsID = Complaint::select('id')->get();
//        if ($postsID->count() > 4) {
            foreach ($postsID as $postID) {
                $commentsCount[] = PostComment::where('complaint_id', $postID['id'])->select('complaint_id', 'id')->get();
            }
//            dd($commentsCount);
            if (count($commentsCount[0]) != 0 && count($commentsCount[1]) != 0 ) {
                rsort($commentsCount);
                $output = array_slice($commentsCount, 0, 3);
//                dd($output);
                foreach ($output as $key => $post) {
                    $postId = $post[$key]['complaint_id'];
                    $posts[] = Complaint::where('id', $postId)->get()->toArray();

                }
//                dd($posts[1][1]);
//                dd();
                return view('template.index', compact(['complaints', 'posts', 'postCount', 'userCount']))->render();

//            }

        }
        return view('template.index', compact(['complaints', 'userCount', 'postCount']));
    }

    public function about()
    {
        return view('template.about');
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

