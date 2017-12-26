<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

//Password Broker Facade
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    //Sends Password Reset emails
    use SendsPasswordResetEmails;

    //Shows form to request password reset
    public function showLinkRequestForm()
    {
        return view('auth.passwords.email');
    }

    //Password Broker for Seller Model
    public function broker()
    {
        return Password::broker('users');
    }

    public function __construct()
    {
        $this->middleware('guest');
    }
}
