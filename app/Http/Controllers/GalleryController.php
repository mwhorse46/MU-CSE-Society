<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Album;
use App\Gallery;

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
        $photos = DB::table('galleries')->join('albums', 'albums.id', '=', 'galleries.albumId')->where('albums.id', '=', $id)->get(['galleries.*']);
        
        return view('admin.albumControl', ['title' => $title, 'photos' => $photos, 'albumName' => $albumName, 'albumId' => $id]);
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

    public function deleteAlbum(Request $request)
    {
        $id = $request->get('id');
        $album = Album::find($id);
        $album->delete();
        return redirect('/admin/gallery')->with('status', 'Album Deleted Successfully.');
    }

    public function insertPhoto(Request $request)
    {
        $this->validate($request, [
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $image = null;
        if ($request->hasFile('image')) {
            $imageName = $request->file('image');
            $extension = $imageName->getClientOriginalExtension();
            $image = date('Y-m-d') . '-' . str_random(10) . '.' . $extension;
            $imageName->move(public_path('images/'), $image);
        }

        $id = $request->input('albumId');
        $photo = new Gallery();
        $photo->albumId = $id;
        $photo->image = $image;
        $photo->caption = $request->input('caption');

        $photo->save();

        $album = Album::find($id);
        $album->coverImage = $image;
        $album->save();

        return redirect('/admin/gallery/album?id='.$id)->with('status', 'Photo Added Successfully.');
    }

    public function updatePhoto(Request $request)
    {
        $id = $request->input('id');
        $albumId = $request->input('albumId');
        $photo = Gallery::find($id);
        $photo->caption = $request->input('caption');

        $photo->save();
        return redirect('/admin/gallery/album?id='.$albumId)->with('status', 'Photo Updated Successfully.');
    }

    public function deletePhoto(Request $request)
    {
        $id = $request->input('id');
        $photo = Gallery::find($id);
        $albumId = $photo->albumId; 

        // deleting imgage
        $path = dirname(__FILE__) . "/../../../" . 'public/images/' . $photo->image;
        if ( is_Writable($path) ) {
            unlink($path);
        } else {
            return redirect('/admin/gallery/album?id='.$albumId)->with('error', 'Something Went Wrong.');
        }
        // end of image delete
        
        $photo->delete();

        $cover = Gallery::where('albumId', '=', $albumId)
        ->orderBy('created_at', 'DESC')->first();

        $album = Album::find($albumId);
        if($cover === null) {
            $album->coverImage = "no-image-available.jpg";
        } else {
            $album->coverImage = $cover->image;
        }
        $album->save();

        return redirect('/admin/gallery/album?id='.$albumId)->with('status', 'Photo Deleted Successfully.');
    }
}
