<?php

namespace App\Http\Controllers;

use App\Message;
use App\Notifications\MessageSend;
use App\User;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {
        $users = User::where('id', '!=', auth()->id())->get();

        return view('home', compact('users'));
    }

    public function store(Request $request)
    {
        // Validación
        $this->validate($request, [
            'body' => 'required',
            'recipient_id' => 'required|exists:users,id'
        ]);

        $message = Message::create([
            'sender_id' => auth()->id(),
            'recipient_id' => $request->recipient_id,
            'body' => $request->body
        ]);

        $recipient = User::find($request->recipient_id);

        $recipient->notify(new MessageSend($message));

        return redirect('/')->with('flash', 'Tu mensaje fué enviado');
    }

    public function show($id)
    {
        $message = Message::findOrFail($id);

        return view('messages.show', compact('message'));
    }
}
