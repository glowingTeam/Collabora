<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sponsorship;

class SponsorshipController extends Controller
{
    function addsponsorship(Request $request){
        $this->validate($request, [
            'account_id' => 'required',
            'nama_sponsor' => 'required',
            'contact' => 'required',
            'image' => 'required|file'
        ]);

        $filename = $request->file('image')->storePublicly('public/sponsor');
        // dd($request);
        // Sponsorship::create([
        //     'account_id' => $request->account_id,
        //     'nama_sponsor' => $request->nama_sponsor,
        //     'status' => 'request',
        //     'contact' => $request->contact,
        //     'img' => $filename
        // ]);

        $sp = new Sponsorship();
        $sp->account_id = $request->account_id;
        $sp->nama_sponsor = $request->nama_sponsor;
        $sp->status = 'request';
        $sp->contact = $request->contact;
        $sp->img = $filename;
        $sp->save();

        return redirect('/dashboard')->with('status', 'Data Berhasil Ditambahkan!');
    }
    public function index()
    {
        $sponsor = Sponsorship::    where('account_id', session('account')['id'])->get();
        return view('page/sponsorshipList', ['sponsorshipList' => $sponsor]);
    }

    public function show($sponsor)
    {
        $volunteer = Sponsorship::with('account')->where('event_id', $sponsor)->get();
        return view('page/list-volunteer', ['sponsorList' => $sponsor]);
    }
    // public function showAccepted($event)
    // {
    //     $volunteer = addSponsorshipModel::with('event','account')->where('event_id', $event)->get();
    //     return view('page/accepted-volunteer', ['volunteerList' => $volunteer]);
    // }
}
