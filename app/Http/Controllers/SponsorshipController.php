<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sponsorship;

// CATATAN SOLID

// 1. Single Responsibility Principle (SRP)
// Masalah:

// SponsorshipController menangani lebih dari satu tanggung jawab, yaitu:
// Validasi input
// Penyimpanan file gambar
// Operasi database
// Menangani business logic (mengubah status sponsorship)
// Menangani redirect dan tampilan
// Solusi:

// Pisahkan beberapa tanggung jawab ke dalam service class (SponsorshipService) untuk memproses data sponsorship.
// Buat form request (SponsorshipRequest) untuk menangani validasi input.



// 2. Open/Closed Principle (OCP)
// Masalah:

// Jika ada perubahan dalam cara penyimpanan gambar (misalnya ke cloud storage seperti AWS S3), kita harus mengubah SponsorshipController.
// Solusi:

// Buat abstraksi ImageStorageInterface agar bisa mengganti penyimpanan tanpa mengubah controller.


// 5. Dependency Inversion Principle (DIP)
// Masalah:

// Controller langsung berinteraksi dengan model Sponsorship, yang membuatnya terlalu bergantung pada implementasi konkret.
// Solusi:

// Gunakan repository pattern (SponsorshipRepository) untuk menangani interaksi dengan database.
class SponsorshipController extends Controller
{

    // controller terlalu banya tanggung jawab
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

    // Dependency Inversion Principle (DIP) - Controller Langsung Bergantung pada Model
    // Controller langsung berkomunikasi dengan model Sponsorship, sehingga sulit diuji dan dimodifikasi.
    public function deny($id)
    {
        // eca
        // $sponsor = Sponsorship::where('event_id', $id)->first();
        // // dd($volunteer);
        // $sponsor->delete();
        // return redirect('/partner');

        $sponsor = Sponsorship::where('event_id', $id)->first();

        if ($sponsor) {
            $sponsor->delete();
            return redirect('/partner')->with('success', 'Sponsor berhasil dihapus.');
        } else {
            return redirect('/partner')->with('error', 'Sponsor tidak ditemukan.');
        }
    }

    public function accept($id)
    {
        $sponsor = Sponsorship::where('id', $id)->first();
        $sponsor->status = 'partner';
        $sponsor->save();
        return redirect('/partner');
    }
    public function partner()
    {
        $sponsor = Sponsorship::all();
        return view('page/partner', ['listSponsor' => $sponsor]);
    }
}
