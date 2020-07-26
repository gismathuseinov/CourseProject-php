<?php

namespace App\Http\Controllers;

use App\Complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Delete extends Controller
{
    public function delete(Request $request)
    {
        $id = $request->id;

        Complaint::where('is_letted', 0)->where('id', $id)->delete();
    }
}
