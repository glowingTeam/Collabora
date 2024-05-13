<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function index()
    {
        return view('page/login');
    }

    function manage(){
        $account = Account::all();
        return view('/admin/manage-account', ['accountList' => $account]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('page/register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->password == $request->passwordconfirm) {
            $validateData = $request->validate([
                'name' => 'required',
                'email' => 'required',
                'password' => 'required'
            ]);

            $validateData['password'] = bcrypt($validateData['password']);
            DB::insert('INSERT INTO accounts (name, email, password) VALUES (?, ?, ?)', [
                $validateData['name'],
                $validateData['email'],
                $validateData['password']
            ]);
            return redirect('/account');
        } else {
            return redirect('/page/register')->withErrors('eror','Password yang anda masukkan berbeda!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Account $account)
    {
        return view('page/account-edit', [
            'account' => $account
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Account $account)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $account->name = $validateData['name'];
        $account->email = $validateData['email'];
        $account->password = bcrypt($validateData['password']);

        $account->save();
        return redirect('/admin/manage-account');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Account $account)
    {
        $account->delete();
        return redirect('/admin/manage-account');
    }
}
