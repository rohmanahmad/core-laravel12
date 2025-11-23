<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OtpController extends Controller
{
    public function showOtpForm()
    {
        return view('themes.default.auth.otp-confirmation');
    }

    public function confirmOtp(Request $request)
    {
        $request->validate(['otp' => 'required|string']);
        // Example OTP check (replace with your logic)
        if ($request->otp === session('otp')) {
            session()->forget('otp');
            return redirect('/')->with('status', 'OTP confirmed!');
        }
        return back()->withErrors(['otp' => 'Invalid OTP']);
    }
}
