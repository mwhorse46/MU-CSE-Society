<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;

class MessageController extends Controller
{
    //
    public function insert(Request $request) {
        Message::create($request->only('name', 'email', 'message'));
        return redirect('/')->with('status', 'Message Sent To Admin.');
    }
}
