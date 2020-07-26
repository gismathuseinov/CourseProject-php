<?php

namespace App\Http\Controllers;

use App\Comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Delete extends Controller
{
    public function delete(Request $request)
    {
        $id = $request->id;

        Comments::where('is_letted', 0)->where('id', $id)->delete();
    }
}
