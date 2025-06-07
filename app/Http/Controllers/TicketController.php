<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;

class TicketController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'subject' => 'required|string|max:255',
            'department' => 'required|in:support,technical,financial,investment',
            'message' => 'required|string',
            'attachment' => 'nullable|file|mimes:jpg,png,pdf|max:2048'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $attachmentPath = null;
        if ($request->hasFile('attachment')) {
            $attachmentPath = $request->file('attachment')->store('ticket_attachments', 'public');
        }

        Ticket::create([
            'user_id' => Auth::id(),
            'subject' => $request->subject,
            'department' => $request->department,
            'message' => $request->message,
            'attachment' => $attachmentPath,
            'status' => 'open'
        ]);

        return redirect()->back()->with('success', 'Ticket submitted successfully');
    }
}
