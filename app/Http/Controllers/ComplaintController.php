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
        $post = \App\Complaint::findOrFail($id);

        $comments = PostComment::where('complaint_id', $id)->orderBy('id', 'desc')->get();

        return view('proyekt.post', compact(['post', 'comments']));
    }

    public function complaint()
    {
        $comment = \App\Complaint::all();
        return view('proyekt.complaint', compact('comment'));
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
