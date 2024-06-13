<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sponsorship;

class SponsorshipController extends Controller
{
    public function addsponsorship(Request $request)
    {
        // dd($request->all());

        // Validate the incoming request
        $validate = $request->validate([
            'account_id' => 'required',
            'event_id' => 'required',
            'nama_sponsor' => 'required',
            'contact' => 'required',
            'image' => 'required|image'
        ]);
        // dd('test');

        // Store the uploaded file and get the filename
        $filename = $request->file('image')->store('public/sponsor');

        // Create a new Sponsorship instance and save it to the database
        $sponsorship = new Sponsorship();
        $sponsorship->account_id = $request->account_id;
        $sponsorship->event_id = $request->event_id;
        $sponsorship->nama_sponsor = $request->nama_sponsor;
        $sponsorship->status = 'request';
        $sponsorship->contact = $request->contact;
        $sponsorship->img = $filename;
        $sponsorship->save();

        // Redirect to the dashboard with a success message
        return redirect('/dashboard')->with('status', 'Data Berhasil Ditambahkan!');
    }
    public function index($id)
    {
        $sponsor = Sponsorship::where('event_id', $id)->get();
        return view('page/sponsorshipList', ['sponsorshipList' => $sponsor]);
    }

    public function show($id_event)
    {
        $sponsor = Sponsorship::where('event_id', $id_event)->get();
        // dd($sponsor);
        return view('page/sponsorshipList', ['sponsorList' => $sponsor]);
    }

    public function deny($id){
        $sponsor = Sponsorship::where('event_id', $id)->first();
        // dd($volunteer);
        $sponsor->delete();
        return redirect('/partner');
    }
    public function accept($id){
        $sponsor = Sponsorship::where('id', $id)->first();
        $sponsor->status='partner';
        $sponsor->save();
        return redirect('/partner');
    }
    public function partner(){
        $sponsor = Sponsorship::all();
        return view('page/partner', ['listSponsor'=>$sponsor]);
    }
}
