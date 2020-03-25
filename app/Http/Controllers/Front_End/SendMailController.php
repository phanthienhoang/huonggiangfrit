<?php

namespace App\Http\Controllers\Front_End;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class SendMailController extends Controller
{

    public function send(Request $request)
    {
        $this->validate($request, [
            'subject'     =>  'required',
            'name'     =>  'required',
            'email'  =>  'required|email',
            'message' =>  'required',
            'g-recaptcha-response' => 'required'
        ]);

        Mail::to('phanthienhoang95@gmail.com')->send(new ContactMail($request));


        return redirect('/')->with('success', 'Thanks for contacting us!');
    }
}
