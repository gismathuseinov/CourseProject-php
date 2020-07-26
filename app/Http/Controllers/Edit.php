<?php

namespace App\Http\Controllers;

use App\Comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Edit extends Controller
{
    public function edit(Request $request)
    {
        $id = $request->id;
        $d = Comments::where('id',$id)->update(
            [
                'company_name' => $request->company_name,
                'complaint_title' => $request->complaint_title,
                'complaint_body' => $request->complaint_body,
            ]
        );
//        dd($d);
        return response()->json(['message' => 'success']);
    }
}
