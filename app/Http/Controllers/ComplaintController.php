<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests\Complaint;
use Illuminate\Support\Facades\Auth;

class ComplaintController extends Controller
{
    public function create_post(Complaint $complaint)
    {

        $user = \auth()->user();

        $user = User::find($user->id);

        $user->posts()->create($complaint->validated());

        return response()->json([
            'msg' => 'Şikayətə 24 saat ərzində baxılacaq'
        ]);

    }
}
