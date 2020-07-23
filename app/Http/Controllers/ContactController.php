<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function send(Request $request){
        $id=Auth::id();
        $name=$request->name;
        $email=$request->email;
        $mesaj=$request->mesaj;

        DB::table('feedback')
            ->insert([
                'user_id'=>$id,
                'email'=>$email,
                'message_title'=>$name,
                'feedback'=>$mesaj
            ]);
        return response()->json(['message'=>'success']);
    }
}
