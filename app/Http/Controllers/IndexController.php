<?php

namespace App\Http\Controllers;

use App\ReplyComments;
use http\Env\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\Comments;

class IndexController extends Controller
{
    public function about()
    {
        return view('proyekt.about');
    }

    public function index(Request $request)
    {
 
        // $user = DB::select('SELECT COUNT(id) as say FROM users');

        $userCount = User::count();
        
        // $sikayet = DB::select('SELECT COUNT(id) as sikayetsay FROM comments WHERE is_letted=1');
        $issueCount = Comments::where('is_letted', 1)->count();


        // $comments = DB::table('comments')
        //     ->where('is_letted', '=', 1)
        //     ->leftJoin('users', 'comments.user_id', '=', 'users.id')
        //     ->select('comments.commenttitle', 'users.name', 'comments.comment', 'comments.id', 'comments.company_name', 'comments.created_at')
        //     ->paginate(6);
        $comments = Comments::where('is_letted', 1)->paginate(6);
        return view('proyekt.index', [
            'comments' => $comments,
            'users' => $userCount,
            'sikayet' => $issueCount
        ]);



    }

    public function main()
    {
        return view('proyekt.goindex');
    }

    public function contact()
    {
        return view('proyekt.contactus');
    }

    public function sikayet()
    {
        $comment = DB::table('comments')
            ->where('is_letted', '=', 1)
            ->leftJoin('users', 'comments.user_id', '=', 'users.id')
            ->select('comments.commenttitle', 'users.name', 'comments.comment', 'comments.id', 'comments.company_name', 'comments.created_at')
            ->paginate(6);
        // ->get();
        return view('proyekt.complaint', [
            'comment' => $comment,
        ]);
    }

    public function sikeytet()
    {
        return view('proyekt.sikayetet');
    }

    public function post(Request $request, int $id)
    {
        // $id = $request->id;
        $post = DB::table('comments')
            ->where('comments.id', $id)
            ->leftJoin('users', 'comments.user_id', '=', 'users.id')
            ->select('users.name', 'comments.comment', 'comments.commenttitle', 'comments.compphoto', 'comments.company_name', 'comments.created_at','comments.id')
            ->get();

        $getdata = DB::table('reply_comments')
                ->where('reply_comments.post_id',$id)
                ->leftJoin('users','reply_comments.user_id','=','users.id')
                ->leftJoin('comments','reply_comments.post_id','=','comments.id')
                ->select('users.name','reply_comments.comments')
                ->get();
        return view('proyekt.post', [
            'post' => $post,
            'getdata'=>$getdata,
        ]);
    }

    public function post_comment(Request $request)
    {
        $comments = $request->comments;
        $user_id=Auth::id();
        $post_id = $request->post_id;
        $name = Auth::user()->name;
        $add = new ReplyComments();
        $add->user_id = $user_id;
        $add->post_id = $post_id;
        $add->comments = $comments;
        $add->save();
        return response()->json(['message'=>'success','name'=>$name,'comment'=>$comments,]);
    }
    public function search(Request $request){
        $data = $request->data;
        $result = DB::table('comments')
            ->leftJoin('users', 'comments.user_id', '=', 'users.id')
            ->select('comments.commenttitle', 'users.name', 'comments.comment', 'comments.id', 'comments.company_name', 'comments.created_at')
            ->where('comments.comment', 'LIKE', "%{$data}%")
            ->orWhere('comments.company_name','LIKE',"%{$data}%")
            ->orWhere('comments.commenttitle','LIKE',"%{$data}%")
            ->get();
        return response()->json(['message'=>'success', 'result'=>$result]);

    }
}

