<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\EventRegistModel;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class EventRegistController extends Controller
{
    public function addeventregist(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'birthdate' => 'required',
            'experience' => 'required'
        ]);

        EventRegistModel::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'birthdate' => $request->birthdate,
            'experience' => $request->experience
        ]);

        return redirect('/dashboard')->with('status', 'Data Berhasil Ditambahkan!');
    }
    public function index()
    {
        $volunteer = EventRegistModel::all();
        return view('page/list-volunteer', ['volunteerList' => $volunteer]);
    }
}
