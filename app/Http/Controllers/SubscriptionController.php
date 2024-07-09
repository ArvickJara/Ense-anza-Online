<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class SubscriptionController extends Controller
{
    public function show()
    {
        $user = Auth::user();

        if ($user && $user->subscription) {
            $remainingDays = Carbon::now()->diffInDays(Carbon::parse($user->subscription_end_date), false);
            return view('subscription', compact('remainingDays'));
        }

        return view('subscription');
    }

    public function subscribe(Request $request)
    {
        $user = Auth::user();

        if ($user) {
            if ($request->plan === 'monthly') {
                $user->subscription = 'monthly';
                $user->subscription_end_date = Carbon::now()->addDays(30);
            } elseif ($request->plan === 'annual') {
                $user->subscription = 'annual';
                $user->subscription_end_date = Carbon::now()->addDays(365);
            }

            $user->save();

            return redirect("/")->with('success', 'Subscription updated successfully.');
        }

        return redirect()->route('login');
    }
}