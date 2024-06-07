<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sponsorship;

class SponsorshipController extends Controller
{
    function addsponsorship(Request $request){
        $this->validate($request, [
            'nama_sponsor' => 'required',
            'contact' => 'required',
            'image' => 'required|file'
        ]);

        $filename = $request->file('image')->storePublicly('public/sponsor');

        Sponsorship::create([
            'account_id' => session('account')->id,
            'nama_sponsor' => $request->nama_sponsor,
            'status' => 'request',
            'contact' => $request->contact,
            'img' => $filename
        ]);
        return redirect('/dashboard')->with('status', 'Data Berhasil Ditambahkan!');
    }
    public function index()
    {
        $sponsor = Sponsorship::with('Account')->where('account_id', session('account')['id'])->get();
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
