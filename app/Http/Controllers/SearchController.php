<?php

namespace App\Http\Controllers;

use App\Complaint;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $data = $request->data;
        $results = Complaint::where([
            ['complaint_title', 'like', "%{$data}%"],
            ['complaint_body', 'like', "%{$data}%"],
            ['company_name', 'like', "%{$data}%"],
        ])->with('user')->get();
//        dd($results);
        return response()->json(['message' => 'success', 'results' => $results]);
    }
}

