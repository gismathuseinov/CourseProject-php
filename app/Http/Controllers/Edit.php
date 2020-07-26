<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Edit extends Controller
{
    public function edit(Request $request)
    {
        $id = $request->id;
        $new_company_name = $request->new_company_name;
        $new_title = $request->new_title;
        $new_comment = $request->new_comment;

        DB::table('comments')
            ->where('id', '=', $id)
            ->update([
                'company_name' => $new_company_name,
                'commenttitle' => $new_title,
                'comment' => $new_comment
            ]);
        return response()->json(['message' => 'success']);
    }
}
