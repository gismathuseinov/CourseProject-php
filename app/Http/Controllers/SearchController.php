<?php

namespace App\Http\Controllers;

use App\Complaint;
use App\PostComment;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $data = $request->data;
        $results = Complaint::where('complaint_title', 'like', "%{$data}%")
            ->orWhere('complaint_body', 'like', "%{$data}%")
            ->orWhere('company_name', 'like', "%{$data}%")
            ->with('user')->get();
            if ($results === null) {
        return response()->json(['message' => 'success', 'results' => $results]);
            	
            }else{
            	return response()->json(['message' => 'failed']);
            }
    }
}

