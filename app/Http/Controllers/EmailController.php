<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function send()
    {
        return view('auth.verify-email');
    }

    public function receive(EmailVerificationRequest $request)
    {
        $request->fulfill();
        return redirect('/')->with('message', 'Verification Complete!');
    }

    public function resend(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();

        return back()->with('message', 'Verification Link Sent!');
    }
}
