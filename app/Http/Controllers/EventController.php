<?php

namespace App\Http\Controllers;

use App\Models\Event;
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

    function search(Request $request) {
        $event = Event::all();
        $search = $request->search;
        $event = event::where('name_event', 'LIKE', '%'.$search.'%')->get();
        return view('event/index', ['eventList' => $event]);
    }

    function create() {
        $class = event::all();
        return view ('page/create-event', ['class' => $class]);
    }

    function store(Request $request) {
        $event = new event;
        $event->name_event = $request->name_event;
        $event->location = $request->location;
        $event->date = $request->date;
        $event->description_event = $request->description_event;
        $event->account_id = session('account')->id;
        $event->save();
        return redirect('/event');
    }

    function show($id) {
        $event = Event::find($id);
        return view('page/event-show', [
            'eventList' => $event
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
