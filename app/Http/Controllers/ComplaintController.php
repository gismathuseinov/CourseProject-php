<?php

namespace App\Http\Controllers;

use App\Http\Requests\Complaint;
use App\PostComment;
use App\User;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
    public function post(Request $request, int $id)
    {
        $post = \App\Complaint::find($id);

        $comments = PostComment::where('complaint_id', $id)->orderBy('id', 'desc')->get();
        return view('template.job-details',compact(['post', 'comments']));
    }

    public function index()
    {
        $complaints = \App\Complaint::where('is_active',1)->where('is_letted',1)->orderBy('id','desc')->paginate(15);
        return view('template.job-listing',compact('complaints'));
    }

    public function create_post(Complaint $complaint)
    {
        $user = \auth()->user();

        $user = User::find($user->id);

        $user->posts()->create($complaint->validated());

        return response()->json([
            'message' => 'Şikayətə 24 saat ərzində baxılacaq'
        ]);
    }
}
