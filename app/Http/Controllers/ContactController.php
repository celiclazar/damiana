<?php

namespace App\Http\Controllers;

use App\Mail\ContactConfirmationMail;
use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string',
            'budget' => 'nullable|string',
            'tattooIdea' => 'required|string',
            'preferredDate' => 'required',
        ]);

        Mail::to('ines.damjanovic7@gmail.com')->send(new ContactFormMail($validated));
        Mail::to($validated['email'])->send(new ContactConfirmationMail($validated));

        return back();
    }
}
