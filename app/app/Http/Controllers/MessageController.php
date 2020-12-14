<?php

namespace App\Http\Controllers;

use App\Mail\MessageReceived;
use Illuminate\Support\Facades\Mail;

// use Illuminate\Http\Request;

// class MessagesController extends Controller
// {
//     public function store(Request $request)
//     {
//         return $request->get('name');
//     }
// }

class MessageController extends Controller
{
    public function store()
    {
        $message = request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'content' => 'required|min:3'
        ], [
            'name.required' => __('I need your name')
        ]);

        // enviar email
        Mail::to('bryanbaez2504@gmail.com')->queue(new MessageReceived($message));
        // mailtrap
        //return new MessageReceived($message);

        return back()->with('status', 'Recibimos tu mensaje, te responderemos en menos de 24 horas.');
    }
}
