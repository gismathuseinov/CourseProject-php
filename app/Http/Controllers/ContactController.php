<?php

namespace App\Http\Controllers;

use App\Http\Requests\Feedback;


class ContactController extends Controller
{
    public function index()
    {
        return view('template.contact');
    }

    public function send(Feedback $request)
    {
        \App\Feedback::create($request->validated());

        return response()->json([
            'status' => 200,
            'message' => 'Bizimlə əlaqə saxladığınız üçün təşəkkürlər!'
        ]);
    }
    public function howItWork()
    {
        return view('template.how-it-work');
    }
}
