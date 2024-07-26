<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Rating;
use Illuminate\Http\Request;

class EventController extends Controller
{
    //
    function index() {
        $event = Event::where('account_id', session('account')->id)->get();
        return view('event/index', ['eventList' => $event]);
        // $search = $request->search;
        // $event = event::where('name_event', 'LIKE', '%'.$search.'%')->get();
    }
    function adminEvent(){
        $event = Event::all();
        return view('event/index', ['eventList' => $event]);
    }

    function search(Request $request) {
        $event = Event::all();
        $search = $request->search;
        $event = event::where('name_event', 'LIKE', '%'.$search.'%')->get();
        return view('page/dashboard', ['events' => $event]);
    }

    function create() {
        $class = event::all();
        return view ('page/create-event', ['class' => $class]);
    }

    function store(Request $request) {
        // $filePath = 'null';
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('event', $filename, 'public');
        }
        $event = new event;
        $event->name_event = $request->name_event;
        $event->location = $request->location;
        $event->date = $request->date;
        $event->description_event = $request->description_event;
        $event->event_image = $filePath ?? null;
        $event->account_id = session('account')->id;
        $event->save();
        return redirect('/event');
    }

    function show($id) {
        $event = Event::find($id);
        $avgRating = Rating::where('event_id', $event->id)->avg('star');
        return view('page/event-show', [
            'eventList' => $event,
            'avgRating' => $avgRating,
        ]); 
    }

    function edit($id) {
        $event = Event::find($id);
        return view('page/event-edit', [
            'eventList' => $event
        ]);
    }

    function update(Request $request, $id) {
        $event = Event::find($id);
        $validateData = $request->validate([
            'name_event' => 'required',
            'location' => 'required',
            'date' => 'required',
            'description_event' => 'required'
        ]);
        $event->name_event = $validateData['name_event'];
        $event->location = $validateData['location'];
        $event->date = $validateData['date'];
        $event->description_event = $validateData['description_event'];
        $event->save();
        return redirect()->route('index');
    }

    function destroy($id) {
        $event = event::where('id', $id);
        $event->delete();
        return redirect('/event');
    }
}
