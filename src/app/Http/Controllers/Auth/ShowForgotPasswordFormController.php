<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

class ShowForgotPasswordFormController extends Controller {
    public function __invoke() {
        return view('themes.default.auth.forgot-password');
    }
}
