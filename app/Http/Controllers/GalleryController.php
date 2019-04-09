<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Album;

class GalleryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $title = "Gallery";
        $albums = Album::get();
        return view('admin.gallery', ['title' => $title, 'albums' => $albums]);
    }

    public function goToAlbum(Request $request)
    {
        $title = "Gallery";

        $id = $request->get('id');
        $album = Album::find($id);
        $albumName = $album->albumName;
        $photos = DB::table('gallery')->join('albums', 'albums.id', '=', 'gallery.albumId')->where('albums.id', '=', $id)->get(['gallery.*']);
        return view('admin.album', ['title' => $title, 'photos' => $photos, 'albumName' => $albumName]);
    }

    public function insertAlbum(Request $request)
    {
        $album = new Album();
        $album->albumName = $request->input('albumName');

        $album->save();
        return redirect('/admin/gallery')->with('status', 'Album Created Successfully.');
    }

    public function updateAlbum(Request $request)
    {
        $id = $request->get('id');
        $album = Album::find($id);
        $album->albumName = $request->input('albumName');

        $album->save();
        return redirect('/admin/gallery')->with('status', 'Album Updated Successfully.');
    }

    public function deleteAlbum()
    {
        $title = "Gallery";
        return view('admin.gallery', ['title' => $title]);
    }
}
