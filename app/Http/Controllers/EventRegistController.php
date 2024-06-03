<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\EventRegistModel;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class EventRegistController extends Controller
{
    public function addeventregist(Request $request , $event)
    {
        //dd($event);
        $this->validate($request, [
            'phone' => 'required',
            'experience' => 'required'
            
        ]);

        EventRegistModel::create([
            'account_id' => session('account')->id,
            'phone' => $request->phone,
            'status' => 'request',  
            'experience' => $request->experience,
            'event_id' => $event
        ]);

        return redirect('/dashboard')->with('status', 'Data Berhasil Ditambahkan!');
    }
    public function index()
    {
        $volunteer = EventRegistModel::with('event')->where('account_id', session('account')->id)->get();
        return view('page/list-volunteer', ['volunteerList' => $volunteer]);
    }

    public function show($event)
    {
        $volunteer = EventRegistModel::with('event','account')->where('event_id', $event)->get();
        return view('page/list-volunteer', ['volunteerList' => $volunteer]);
    }
    public function showAccepted($event)
    {
        $volunteer = EventRegistModel::with('event','account')->where('event_id', $event)->get();
        return view('page/accepted-volunteer', ['volunteerList' => $volunteer]);
    }
    public function deny($id){
        $volunteer = EventRegistModel::findOrFail($id);
        // dd($volunteer);
        $volunteer->delete();
        return redirect('/event');
    }
    public function accept($id){
        $volunteer = EventRegistModel::findOrFail($id);
        // dd($volunteer);
        $volunteer->status='accepted';
        $volunteer->save();
        return redirect('/event');
    }
}
