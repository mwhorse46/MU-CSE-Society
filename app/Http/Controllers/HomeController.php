<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Message;
use App\News;
use App\Event;
use App\Member;
use App\Album;

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

            $albums = Album::get();
            return view('home.home', ['news' => $news, 'pinned' => $pinned, 'newEvent' => $newEvent, 'oldEvent' => $oldEvent, 'topMember' => $topMember, 'others' => $others, 'albums' => $albums]);
        } else
            return redirect()->action('AdminController@index');
    }

    public function goToAlbum(Request $request)
    {
        $title = "Gallery";

        $id = $request->get('id');
        $album = Album::find($id);
        $albumName = $album->albumName;
        $photos = DB::table('galleries')->join('albums', 'albums.id', '=', 'galleries.albumId')->where('albums.id', '=', $id)->get(['galleries.*']);

        return view('home.album', ['title' => $title, 'photos' => $photos, 'albumName' => $albumName, 'albumId' => $id]);
    }

    public function insertMessage(Request $request)
    {
        Message::create($request->only('name', 'email', 'message'));
        return redirect('/')->with('status', 'Message Sent To Admin.');
    }
}
