<?php

namespace App\Http\Controllers;

use App\Comments;
use App\Http\Requests\Complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ComplaintController extends Controller
{
   public function write(Complaint $request){

      // Comments::create($request->validated());

   //    Comments::create([
   //       'email' => "auye@mail.ru"
   //    ]);

   //    return response()
   //    ->json(['status'=>'success','message'=>'24 saat ərzində şikayətinizə baxılacaq']);
   // }

   public function _write(Complaint $request){
        $id = Auth::id();
      //   $validated = $request->validated();

        $compname = $request->compname;// $validated['compname']
        $email = $request->email;
        $complainetname = $request->complainetname;
        $complainet = $request->complainet;
        $send = $request->send;

        $exc = $request->file('compphoto')->getClientOriginalExtension();
        $img_name = time().'.'.$exc;

        $add = new Comments();
        $add->user_id=$id;
        $add->email=$email;
        $add->company_name=$company_name;
        $add->commenttitle=$commenttitle;
        $add->comment=$comment;
        $add->compphoto=$img_name; 
        $add->is_send=$send;
        $add->save();

        $request->file('compphoto')->move('Project/img',$img_name);
       return response()->json(['status'=>'success','message'=>'24 saat ərzində şikayətinizə baxılacaq']);
   }
}
