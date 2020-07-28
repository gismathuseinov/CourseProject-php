<?php

namespace App\Http\Controllers;

use App\Complaint;
use App\PostComment;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{

    public function index(Request $request)
    {
        $userCount = User::count();

        $issueCount = Complaint::where('is_letted', 1)->count();

        $comments = Complaint::where('is_letted', 1)->paginate(6);

        return view('proyekt.index', compact(['userCount', 'issueCount', 'comments']));
    }

    public function about()
    {
        return view('proyekt.about');
    }

    public function main()
    {
        return view('proyekt.goindex');
    }

    public function contact()
    {
        return view('proyekt.contactus');
    }

    public function complaint()
    {
        $comment = Complaint::all();
        return view('proyekt.complaint', compact('comment'));
    }

    public function sikeytet()
    {
        return view('proyekt.sikayetet');
    }

    public function post(Request $request, int $id)
    {
        $post = Complaint::findOrFail($id);

        $comments = PostComment::where('complaint_id', $id)->orderBy('id', 'desc')->get();

        return view('proyekt.post', compact(['post', 'comments']));
    }

    public function comment_create(\App\Http\Requests\PostComment $request, int $post_id)
    {
        $user = \auth()->user();

        $name = $user->name;

        $post = Complaint::findOrFail($post_id);

        $validated = $request->validated();

        $comment = $post->comments()->create([
            'user_id' => $user->id,
            'comments' => $validated['comments'],
        ]);

        return response()->json([
            'status' => 'success',
            'name' => $name,
            'comment' => $comment->comments,
            'time' => date("H:i", strtotime($comment->created_at))
        ]);
    }

    public function get_post_comments(int $post_id)
    {
        $post = Complaint::with(["comments", 'comments.user'])->findOrFail($post_id);
        
        return response()->json([
            'status' => 'OK',
            'comments' => $post->comments,
        ]);
    }

    public function search(Request $request)
    {
        $data = $request->data;
        $result = DB::table('comments')
            ->leftJoin('users', 'comments.user_id', '=', 'users.id')
            ->select('comments.commenttitle', 'users.name', 'comments.comment', 'comments.id', 'comments.company_name', 'comments.created_at')
            ->where('comments.comment', 'LIKE', "%{$data}%")
            ->orWhere('comments.company_name', 'LIKE', "%{$data}%")
            ->orWhere('comments.commenttitle', 'LIKE', "%{$data}%")
            ->get();
        return response()->json(['message' => 'success', 'result' => $result]);

    }


}

