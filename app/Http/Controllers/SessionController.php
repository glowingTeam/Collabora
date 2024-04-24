<?php

namespace App\Http\Controllers;

use app\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class SessionController extends Controller
{
    //
    function dashboard() {
        return view("page/dashboard");
    }
    function index() {
        return view("page/login");
    }

    function masuk(Request $request) {
        Session::flash('email', $request->email);
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ], [
            'email.required' => 'Email wajib diisi',
            'password.required' => 'Password wajib diisi'
        ]);

        $datalogin = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth::attempt($datalogin)) {
            return redirect('/dashboard')->with('success', 'berhasil login');
        } else {
            return redirect('page')->withErrors('Email dan Password yang dimasukkan tidak valid');
        }
    }

    function logout() {
        Auth::logout();
        return redirect('page')->with('succes', 'Berhasil Logout');
    }

    //register
    function register() {
        return view("page/register");
    }
    function createAcc(Request $request){
        Session::flash('name', $request->name);
        Session::flash('email', $request->email);
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:account',
            'password'=>'required|min:6'
        ],[
            'name.required'=>'nama wajib diisi',
            'email.required' => 'email wajib diisi',
            'email.email' => 'silahkan memasukan email yang valid',
            'email.unique' => 'email sudah pernah digunakan, silahkan pilih email yang lain',
            'password.required' => 'password wajib diisi',
            'password.min' => 'minimal password e lebih dari 6 huruf lha ya cok cok'
        ]);

        $data = [
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ];
        User::createAcc($data);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($infologin)) {
            // return redirect('dashboard')->with('success', 'Berhasil login');
            return 'sukses';
        }else{
            // return redirect('page')->withErrors('Username dan passwword yang dimasukan tidak valiis');
            return 'gagal';
        }
    }
}
