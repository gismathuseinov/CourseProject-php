<?php

namespace App\Http\Controllers;

use App\Complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AcceptController extends Controller
{
    public function accept(Request $request){
        $id=$request->id;
        Complaint::where('id',$id)->update(['is_letted' => 1]);

        return response()->json(['message'=>'success']);
    }
}
