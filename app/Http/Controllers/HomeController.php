<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Message;
use App\News;
use App\Event;
use App\Member;

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

        $topMember = DB::table('members')->join('roles', 'roles.id', '=', 'members.role_id')->skip(0)->take(3)->orderBy('rank', 'ASC')->get(['members.*', 'roles.role', 'roles.rank']);
        $count = Member::count();
        $limit = $count - 3;
        if ($count > 3) {
            $others = DB::table('members')->join('roles', 'roles.id', '=', 'members.role_id')->skip(3)->take($limit)->orderBy('rank', 'ASC')->get(['members.*', 'roles.role', 'roles.rank']);
        } else {
            $others = Member::where('name', '=', 'null');
        }
            return view('home.home', ['news' => $news, 'pinned' => $pinned, 'newEvent' => $newEvent, 'oldEvent' => $oldEvent, 'topMember' => $topMember, 'others' => $others]);
        } else
            return redirect()->action('AdminController@index');
    }

    public function insertMessage(Request $request)
    {
        Message::create($request->only('name', 'email', 'message'));
        return redirect('/')->with('status', 'Message Sent To Admin.');
    }
}
