<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;

class MessagesController extends Controller
{
    public function submit(Request $request) {
    	$this->validate($request, [
    		'name' => 'required',
    		'email' => 'required'
    	]);

    	// Create a new message
    	$message = new Message;
    	$message->name = $request->input('name');
    	$message->email = $request->input('email');
    	$message->message = $request->input('message');

    	// Save Message
    	$message->save();

    	// Redirect
    	return redirect('/')->with('success', 'Message Sent');

    }

    public function getMessages() {
    	// Gets all of the messages from the database and place into the variable
    	$messages = Message::all();

    	return view('messages')->with('messages', $messages);
    }
}
