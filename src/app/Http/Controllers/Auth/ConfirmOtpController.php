<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConfirmOtpController extends Controller {
    public function __invoke(Request $request) {
        $request->validate(['otp' => 'required|string']);
        if ($request->otp === session('otp')) {
            session()->forget('otp');
            return redirect('/')->with('status', 'OTP confirmed!');
        }
        return back()->withErrors(['otp' => 'Invalid OTP']);
    }
}
