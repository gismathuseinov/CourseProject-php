<?php

namespace App\Http\Controllers;

use App\Http\Requests\Feedback;


class ContactController extends Controller
{
    public function contact()
    {
        return view('web.contact');
    }

    public function send(Feedback $request)
    {
        \App\Feedback::create($request->validated());

        return response()->json([
            'status' => true,
            'message' => 'Bizimlə əlaqə saxladığınız üçün təşəkkürlər!'
        ]);
    }
}
