<?php

namespace App\Http\Controllers;

use App\Models\Account;
use app\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

// use Illuminate\Support\Facades\Hash;


class SessionController extends Controller
{
    //Menampilkan form login
    function index()
    {
        $account = Account::all();
        return view('page/login', ['accountList' => $account]);
    }

    // Fungsional Login
    function masuk(Request $request)
    {
        try {
            // Session::flash('email', $request->email);
            $request->validate([
                'email' => 'required|email',
                'password' => 'required'
            ]);

            $data = Account::where('email', $request->email)->firstOrFail();
            // $hashedPassword = Hash::make($request->password);
            // dd($hashedPassword);
            if (Hash::check($request->password, $data->password)) {
                // Auth::login($data);
                // dd(Hash::check($request->password, $data->password));
                return redirect('/dashboard')->with('success', 'berhasil login');
            } else {
                return redirect('/account')->withErrors('Email dan Password yang dimasukkan tidak valid');
            }
        } catch (\Exception $e) {
            dd($e);
        }
    }
    function login(Request $request)
    {
        if (session()->has('account')) {
            session()->pull('account');
        }
        return redirect('/dashboard');
    }

    // Fungsional Logout
    public function logout()
    {
        if (session()->has('account')) {
            session()->flush();
        }
        return redirect('/')->with('succes', 'Berhasil Logout');
    }

    //Menampilkan form register
    function create()
    {
        return view("page/register");
    }

    // Fungsional Register
    function register(Request $request)
    {
        Session::flash('name', $request->name);
        Session::flash('email', $request->email);
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:account',
            'password' => 'required|min:6'
        ], [
            'name.required' => 'nama wajib diisi',
            'email.required' => 'email wajib diisi',
            'email.email' => 'silahkan memasukan email yang valid',
            'email.unique' => 'email sudah pernah digunakan, silahkan pilih email yang lain',
            'password.required' => 'password wajib diisi',
            'password.min' => 'minimal password e lebih dari 6 huruf lha ya cok cok'
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ];


        $data = new User;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = $request->password;
        $data->save();


        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        return redirect('/page');

        // if (Auth::attempt($infologin)) {
        //     // return redirect('dashboard')->with('success', 'Berhasil login');
        //     return 'sukses';
        // }else{
        //     // return redirect('page')->withErrors('Username dan passwword yang dimasukan tidak valiis');
        //     return 'gagal';
        // }
    }
}