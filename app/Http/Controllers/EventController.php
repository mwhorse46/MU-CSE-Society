<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;

class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $title = "Events";
        $new = Event::where('ended', '=', false)->orderBy('date', 'ASC')->get();
        $old = Event::where('ended', '=', true)->orderBy('date', 'ASC')->get();
        return view('admin.events', ['title' => $title, 'new' => $new, 'old' => $old]);
    }

    public function addForm()
    {
        $title = "Add Event";
        $action = "/admin/insertEvent";
        $button = "Save";
        return view('admin.eventsEditForm', ['title' => $title, 'action' => $action, 'button' => $button]);
    }

    public function insert(Request $request)
    {
        $this->validate($request, [
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'date' => 'date_format:d/m/Y',
            'start_time' => 'date_format:H:i|nullable',
            'end_time' => 'date_format:H:i|after:start_time|nullable|required_with:start_time'
        ]);

        $image = null;
        if ($request->hasFile('image')) {
            $imageName = $request->file('image');
            $extension = $imageName->getClientOriginalExtension();
            $image = date('Y-m-d') . '-' . str_random(10) . '.' . $extension;
            $imageName->move(public_path('images/'), $image);
        }

        $ended = $request->has('ended') ? true : false;

        $date = $request->input('date');
        $mysqldate = \DateTime::createFromFormat('d/m/Y', $date)->format('Y-m-d');
        $stime = $request->input('start_time');
        if($stime !== null)
            $stime = \DateTime::createFromFormat('H:i', $stime)->format('H:i:00');
        $etime = $request->input('end_time');
        if($etime != null)
            $etime = \DateTime::createFromFormat('H:i', $etime)->format('H:i:00');

        $event = new Event();
        $event->date = $mysqldate;
        $event->stime = $stime;
        $event->etime = $etime;
        $event->image = $image;
        $event->ended = $ended;
        $event->title = $request->input('title');
        $event->place = $request->input('place');
        $event->description = $request->input('description');
        $event->registration = $request->input('registration');
        $event->photos = $request->input('photos');

        $event->save();
        return redirect('/admin/events')->with('status', 'Event Added Successfully.');
    }

    public function editForm(Request $request)
    {
        $title = "Update Event";
        $action = "/admin/updateEvent";
        $button = "Update";
        $id = $request->get('id');
        $event = Event::find($id);
        return view('admin.eventsEditForm', ['title' => $title, 'action' => $action, 'event' => $event, 'button' => $button]);
    }

    public function update(Request $request)
    {
        $id = $request->get('id');
        $event = Event::find($id);

        $this->validate($request, [
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'date' => 'date_format:d/m/Y',
            'start_time' => 'date_format:H:i|nullable',
            'end_time' => 'date_format:H:i|after:start_time|nullable|required_with:start_time'
        ]);

        $image = $request->get('imageOld');
        if ($request->hasFile('image')) {
            $imageName = $request->file('image');
            $extension = $imageName->getClientOriginalExtension();
            $image = date('Y-m-d') . '-' . str_random(10) . '.' . $extension;
            $imageName->move(public_path('images/'), $image);
        }

        $ended = $request->has('ended') ? true : false;

        $date = $request->input('date');
        $mysqldate = \DateTime::createFromFormat('d/m/Y', $date)->format('Y-m-d');
        $stime = $request->input('start_time');
        if($stime !== null)
            $stime = \DateTime::createFromFormat('H:i', $stime)->format('H:i:00');
        $etime = $request->input('end_time');
        if($etime != null)
            $etime = \DateTime::createFromFormat('H:i', $etime)->format('H:i:00');

        $event->date = $mysqldate;
        $event->stime = $stime;
        $event->etime = $etime;
        $event->image = $image;
        $event->ended = $ended;
        $event->title = $request->input('title');
        $event->place = $request->input('place');
        $event->description = $request->input('description');
        $event->registration = $request->input('registration');
        $event->photos = $request->input('photos');

        $event->save();
        return redirect('/admin/events')->with('status', 'Event Updated Successfully.');
    }

    public function delete(Request $request)
    {
        $id = $request->get('id');
        $event = Event::find($id);
        $event->delete();
        return redirect('/admin/events')->with('status', 'Event Deleted Successfully.');
    }
}
