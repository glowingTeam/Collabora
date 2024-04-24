<?php

namespace App\Http\Controllers;

use App\Models\event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    //
    function index(){
        $data = event::all();
        return view('event/index')->with('data', $data);
    }

    function detail($id){
        return "<h1>Ini event dari controller dengan ID $id</h1>";
    }

    function create() {
        $class = event::all();
        return view ('page/create-event', ['class' => $class]);
    }

    function store(Request $request) {
        dd($request->all());
    }
}
