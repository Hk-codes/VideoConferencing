<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactFormController extends Controller
{
    public function sendEmail(Request $request)
    {
        // Validate the form data
        $validated = $request->validate([
            'company_name' => 'required|string|max:255',
            'user_name' => 'required|string|max:255',
            'user_email' => 'required|email|max:255',
            'password' => 'required|string|min:8',
        ]);

        // Send email with the form data
        Mail::send('emails.contact', $validated, function ($message) {
            $message->to('sales@starautomation.net')  // Change this to your email address
                    ->subject('New Registration Required');
        });

        // Return a response after sending the email
        return back()->with('success', 'Your detaila have been sent to our admin wait for approval.');
    }
    public function register(Request $request)
    {
       
        return view('contact-form');
    }
}
