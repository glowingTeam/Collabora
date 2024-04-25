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

    function detail($id) {
        return "<h1>Ini event dari controller dengan ID $id</h1>";
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
}
