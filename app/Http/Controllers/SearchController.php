<?php

namespace App\Http\Controllers;

use App\Complaint as ComplaintModel;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $data = $request->data;

        $results = ComplaintModel::where([
            ['complaint_title','like',"%{$data}%"],
            ['complaint_body','like',"%{$data}%"],
            ['company_name','like',"%{$data}%"],
        ])->get();

        return response()->json(['message' => 'success', 'results' => $results]);

    }
}

