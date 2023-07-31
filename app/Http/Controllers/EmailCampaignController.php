<?php

namespace App\Http\Controllers;

use App\Mail\EmailCampaign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailCampaignController extends Controller
{
    public function create()
    {
        return view('email_campaigns.create');
    }

    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'subject' => 'required',
            'content' => 'required',
            'recipients' => 'required',
        ]);

        // Handle the logic for creating and sending the email campaign
        // You can use Laravel's built-in email functionality to send the email

        // Example code for sending email
        $recipients = $request->input('recipients');
        $subject = $request->input('subject');
        $content = $request->input('content');

        Mail::to($recipients)->send(new EmailCampaign($subject, $content));

        return redirect()->route('customers.index')->with('success', 'Email campaign created and sent successfully.');
    }
}
