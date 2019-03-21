<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Message;
use App\News;
use App\Event;

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
            $newEvent = Event::where('ended', '=', false)->orderBy('date', 'ASC')->get();
            $oldEvent = Event::where('ended', '=', true)->orderBy('date', 'ASC')->get();
            return view('home.home', ['news' => $news, 'pinned' => $pinned, 'newEvent' => $newEvent, 'oldEvent' => $oldEvent]);
        } else
            return redirect()->action('AdminController@index');
    }

    public function insertMessage(Request $request)
    {
        Message::create($request->only('name', 'email', 'message'));
        return redirect('/')->with('status', 'Message Sent To Admin.');
    }
}
