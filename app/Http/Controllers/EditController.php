<?php

namespace App\Http\Controllers;

use App\Complaint;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function edit(Request $request)
    {
        $id = $request->id;
        $d = Complaint::where('id', $id)->update(
            [
                'company_name' => $request->company_name,
                'complaint_title' => $request->complaint_title,
                'complaint_body' => $request->complaint_body,
            ]
        );
        return response()->json(['message' => 'success']);
    }
}
