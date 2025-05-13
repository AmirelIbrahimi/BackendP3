<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactMessage;

class ContactController extends Controller
{
    // Toont het contactformulier
    public function show()
    {
        return view('contact');
    }

    // Verwerkt het formulier en slaat het op
    public function submit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        ContactMessage::create($validated);

        return back()->with('success', 'Bedankt voor je bericht! We nemen zo snel mogelijk contact met je op.');
    }
}

