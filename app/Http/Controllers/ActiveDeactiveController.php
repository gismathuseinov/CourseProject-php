<?php

namespace App\Http\Controllers;

use App\Complaint;
use Illuminate\Http\Request;

class ActiveDeactiveController extends Controller
{
    public function active_deactive(Request $request)
    {
        $post_id = $request->post_id;
        $is_active = $request->is_active;
        if ($is_active==1){
            Complaint::where('id',$post_id)->update([
                'is_active' => 1
            ]);
            return response()->json([
                'status'=>true,
                'id' => $post_id,
                'message' => 'Post Aktivdir'
            ]);
        }
        else{
            Complaint::where('id',$post_id)->update([
                'is_active' => 0
            ]);
            return response()->json([
                'status'=>true,
                'id' => $post_id,
                'message' => 'Post Deaktivdir'
            ]);
        }


    }

}
