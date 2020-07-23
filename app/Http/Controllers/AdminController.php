<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function admin(){
        return view('proyekt.nice-html.ltr.index');
    }

    public function admintable(){
        $base = DB::table('comments')
            ->where('is_letted','=','0')
            ->leftJoin('users','comments.user_id','=','users.id')
            ->select('comments.commenttitle','users.name','comments.comment','comments.id','comments.company_name','comments.email','comments.is_send')
            ->paginate(4);

        return view('proyekt.nice-html.ltr.form-basic',[
            'base'=>$base
        ]);
    }
    public function adminerror(){
        return view('proyekt.nice-html.ltr.error-404');
    }
    public function adminstart(){
        return view('proyekt.nice-html.ltr.starter-kit');
    }
    public function adminmessage(Request $request){
        $id=$request->id;
        $data = DB::table('feedback')
            ->where('id','=',$id)
            ->update([
                'is_seen'=>1,
        ]);
        $feedback = DB::table('feedback')
            ->leftJoin('users','feedback.user_id','=','users.id')
            ->select('users.name','feedback.email','feedback.message_title','feedback.feedback',
                'feedback.id')
            ->get();
        return view('proyekt.nice-html.ltr.table-basic',[
            'feedback'=>$feedback,
            'data'=>$data,
        ]);
    }
    public function adminsee($id){

        $data=DB::table('comments')
            ->where('comments.id',$id)
            ->leftJoin('users','comments.user_id','=','users.id')
            ->select('comments.company_name','comments.commenttitle','comments.comment','comments.compphoto','comments.id','users.name','users.number')->get();

        return view('proyekt.nice-html.ltr.see',['data'=>$data] );
    }
}

