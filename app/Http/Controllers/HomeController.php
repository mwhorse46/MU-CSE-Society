<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Message;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::guest())
            return view('home.home');
        else
            return view('admin.adminHome');
    }

    public function insertMessage(Request $request) {
        Message::create($request->only('name', 'email', 'message'));
        return redirect('/')->with('status', 'Message Sent To Admin.');
    }
}
