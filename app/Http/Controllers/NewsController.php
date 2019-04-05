<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;

class NewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $title = "News";
        $news = News::where('pinned', '=', false)->orderBy('date', 'DESC')->get();
        $pinned = News::where('pinned', '=', true)->get();
        return view('admin.news', ['title' => $title, 'newses' => $news, 'pinned' => $pinned]);
    }

    public function addForm()
    {
        $title = "Add News";
        $action = "/admin/insertNews";
        $button = "Save";
        return view('admin.newsEditForm', ['title' => $title, 'action' => $action, 'button' => $button]);
    }

    public function insert(Request $request)
    {
        $this->validate($request, [
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'date' => 'date_format:d/m/Y'
        ]);

        $image = null;
        if ($request->hasFile('image')) {
            $imageName = $request->file('image');
            $extension = $imageName->getClientOriginalExtension();
            $image = date('Y-m-d') . '-' . str_random(10) . '.' . $extension;
            $imageName->move(public_path('images/'), $image);
        }

        $pinned = $request->has('pinned') ? true : false;
        if($pinned === true) {
            News::where('pinned', true)->update(['pinned' => false]);
        }

        $news = new News();
        $date = $request->input('date');
        $mysqldate = \DateTime::createFromFormat('d/m/Y', $date)->format('Y-m-d');
        $news->date = $mysqldate;
        $news->title = $request->input('title');
        $news->image = $image;
        $news->news = $request->input('news');
        $news->pinned = $pinned;

        $news->save();
        return redirect('/admin/news')->with('status', 'News Added Successfully.');
    }

    public function editForm(Request $request)
    {
        $title = "Update News";
        $action = "/admin/updateNews";
        $button = "Update";
        $id = $request->get('id');
        $news = News::find($id);
        return view('admin.newsEditForm', ['title' => $title, 'action' => $action, 'news' => $news, 'button' => $button]);
    }

    public function update(Request $request)
    {
        $id = $request->get('id');
        $news = News::find($id);

        $this->validate($request, [
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'date' => 'date_format:d/m/Y'
        ]);

        $image = $request->get('imageOld');
        if ($request->hasFile('image')) {
            $imageName = $request->file('image');
            $extension = $imageName->getClientOriginalExtension();
            $image = date('Y-m-d') . '-' . str_random(10) . '.' . $extension;
            $imageName->move(public_path('images/'), $image);
        }

        $pinned = $request->has('pinned') ? true : false;
        if($pinned === true) {
            News::where('pinned', true)->update(['pinned' => false]);
        }

        $date = $request->input('date');
        $mysqldate = \DateTime::createFromFormat('d/m/Y', $date)->format('Y-m-d');
        $news->date = $mysqldate;
        $news->title = $request->input('title');
        $news->image = $image;
        $news->news = $request->input('news');
        $news->pinned = $pinned;
        $news->save();
        return redirect('/admin/news')->with('status', 'News Updated Successfully.');
    }

    public function delete(Request $request)
    {
        $id = $request->get('id');
        $news = News::find($id);

        // deleting imgage
        $path = dirname(__FILE__) . "/../../../" . 'public/images/' . $news->image;
        if ( is_Writable($path) ) {
            unlink($path);
        } else {
            return redirect('/admin/news')->with('error', 'Something Went Wrong.');
        }
        // end of image delete
        
        $news->delete();
        return redirect('/admin/news')->with('status', 'News Deleted Successfully.');
    }
}
