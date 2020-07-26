<?php

namespace App\Http\Controllers;

use App\Comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Accept extends Controller
{
    public function accept(Request $request){
        $id=$request->id;
        Comments::where('id',$id)->update(['is_letted' => 1]);

        return response()->json(['message'=>'success']);
    }
}
