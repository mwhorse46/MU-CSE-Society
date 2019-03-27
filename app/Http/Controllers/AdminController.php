<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\News;
use App\Event;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::where('pinned', '=', false)->orderBy('date', 'DESC')->get();
        $pinned = News::where('pinned', '=', true)->get();
        $newEvent = Event::where('ended', '=', false)->orderBy('date', 'ASC')->get();
        $oldEvent = Event::where('ended', '=', true)->orderBy('date', 'ASC')->get();
        return view('admin.adminHome', ['news' => $news, 'pinned' => $pinned, 'newEvent' => $newEvent, 'oldEvent' => $oldEvent]);
    }

    public function inbox()
    {
        $title = "Inbox";
        $messages = Message::orderBy('created_at', 'DESC')->get();
        return view('admin.inbox', ['title' => $title, 'messages' => $messages]);
    }

    public function gallery()
    {
        $title = "Gallery";
        return view('admin.gallery', ['title' => $title]);
    }

    public function deleteMsg(Request $request)
    {
        $id = $request->get('id');
        $message = Message::find($id);
        $message->delete();
        return redirect('/admin/inbox')->with('status', 'Message Deleted Successfully.');
    }
}
