<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    //
    function index() {
        $event = Event::all();
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
        $event->save();
        return redirect('/event');
    }

    function show($id) {
        $event = Event::find($id);
        return view('page/event-show', [
            'eventList' => $event
        ]);
    }

    function edit(Event $event) {
        return view('page/event-edit', [
            'eventList' => $event
        ]);
    }

    function update() {
        
    }

    function destroy(Event $event) {
        $event->delete();
        return redirect('/event');
    }
}
