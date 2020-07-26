<?php

namespace App\Http\Controllers;

use App\Http\Requests\Feedback;
use Illuminate\Http\Request;


class ContactController extends Controller
{
    public function send(Feedback $request)
    {
        \App\Feedback::create($request->validated());

        return response()->json([
            'status' => true,
            'message' => 'Bizimlə əlaqə saxladığınız üçün təşəkkürlər'
        ]);
    }
}
