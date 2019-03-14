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
        $news = News::orderBy('date', 'DESC')->get();
        return view('admin.news', ['title' => $title, 'newses' => $news]);
    }

    public function addForm()
    {
        $title = "Add News";
        $action = "/admin/insertNews";
        $button = "Save";
        return view('admin.addNews', ['title' => $title, 'action' => $action, 'button' => $button]);
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

        $news = new News();
        $date = $request->input('date');
        $mysqldate = \DateTime::createFromFormat('d/m/Y', $date)->format('Y-m-d');
        $news->date = $mysqldate;
        $news->title = $request->input('title');
        $news->image = $image;
        $news->news = $request->input('news');

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
        return view('admin.addNews', ['title' => $title, 'action' => $action, 'news' => $news, 'button' => $button]);
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
        $date = $request->input('date');
        $mysqldate = \DateTime::createFromFormat('d/m/Y', $date)->format('Y-m-d');
        $news->date = $mysqldate;
        $news->title = $request->input('title');
        $news->image = $image;
        $news->news = $request->input('news');
        $news->save();
        return redirect('/admin/news')->with('status', 'News Updated Successfully.');
    }

    public function delete(Request $request)
    {
        $id = $request->get('id');
        $news = News::find($id);
        $news->delete();
        return redirect('/admin/news')->with('status', 'News Deleted Successfully.');
    }
}
