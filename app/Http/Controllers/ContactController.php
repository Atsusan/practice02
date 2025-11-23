<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Mail\ContactAdminMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact.index');
    }

    function sendMail(ContactRequest $request)
    {
        $validated = $request->validated();

        Mail::to('admin@example.com')->send(new ContactAdminMail($validated));
        return to_route('contact.complete');
    }

    public function complete()
    {
        return view('contact.complete');
    }
}
