<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('home.contact.index');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|string|max:20',
            'event_type' => 'nullable|string|max:100',
            'budget' => 'nullable|string|max:100',
            'message' => 'required|string',
        ]);

        Inquiry::create($validated);

        return redirect()->route('contact.message-success')->with('success', 'Message sent successfully!');
    }

    public function message_success()
    {
        $inquiries = Inquiry::latest()->first();
        return view('home.contact.message-success', compact('inquiries'));
    }
}
