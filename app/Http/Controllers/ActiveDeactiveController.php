<?php

namespace App\Http\Controllers;

use App\Complaint;
use Illuminate\Http\Request;

class ActiveDeactiveController extends Controller
{
    public function active_deactive(Request $request, int $post_id)
    {

       $post = Complaint::findOrFail($post_id);
       $post->update($request->all());
        return response()->json([
            'status' => 'ok',
            'message' => 'Good'
        ]);
    }

}
