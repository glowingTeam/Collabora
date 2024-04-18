<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    //
    function dashboard() {
        return view("page/dashboard");
    }
    function login() {
        return view("page/login");
    }

    function masuk(Request $request) {
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
            return 'success';
        } else {
            return 'failed';
        }
    }
}
