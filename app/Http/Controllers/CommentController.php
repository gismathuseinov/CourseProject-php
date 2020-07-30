<?php

namespace App\Http\Controllers;

use App\Complaint;
use Illuminate\Http\Request;

class CommentController extends Controller
{
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
}
