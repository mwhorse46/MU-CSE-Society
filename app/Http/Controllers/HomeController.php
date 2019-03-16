<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Message;
use App\News;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::guest()) {
            $news = News::where('pinned', '=', false)->orderBy('date', 'DESC')->get();
            $pinned = News::where('pinned', '=', true)->get();
            return view('home.home', ['news' => $news, 'pinned' => $pinned]);
        } else
            return redirect()->action('AdminController@index');
    }

    public function insertMessage(Request $request)
    {
        Message::create($request->only('name', 'email', 'message'));
        return redirect('/')->with('status', 'Message Sent To Admin.');
    }
}
