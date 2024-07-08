<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Subscription;

class SubscriptionController extends Controller
{
    public function show()
    {
        return view('subscription');
    }

    public function store(Request $request)
    {
        $request->validate([
            'plan' => 'required|in:monthly,annual',
        ]);

        Subscription::create([
            'user_id' => Auth::id(),
            'plan' => $request->plan,
        ]);

        return redirect()->route('home')->with('success', 'Suscripción realizada con éxito.');
    }
}