<?php

// namespace App\Http\Controllers;

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

    // Menampilkan form login
    function index()
    {
        return view('page/login');
    }

    // Menampilkan semua data account
    function manage(){
        $account = Account::all();
        return view('/admin/manage-account', ['accountList' => $account]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // Menampilkan form register
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
    // Fungsional Register
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:accounts',
            'password' => 'required|confirmed|min:6' // `confirmed` checks if `password_confirmation` matches
        ]);

        // Hash password before saving
        $password = bcrypt($request->password);

        // Insert into database
        DB::table('accounts')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'role' => 'user',
            'password' => $password
        ]);

        // return redirect('/account')->with('success', 'Akun berhasil dibuat!');
        return response()->json(['message' => 'You Have Created Your Account!']);
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
    // Menampilkan form edit
    public function edit(Account $account)
    {
        return view('page.account-edit', compact('account'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // Fungsional Edit
    public function update(Request $request, Account $account)
    {

        $validateData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);
        // dd($validateData);
        $account->name = $validateData['name'];
        $account->email = $validateData['email'];
        $account->password = bcrypt($validateData['password']);


        $account->save();
        return redirect()->route('manage');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // Fungsional Delete
    // public function destroy(Account $account)
    // {
    //     $account->delete();
    //     return redirect('/admin/manage-account');
    // }

    public function destroy(Account $account)
    {
    $account->delete();
    return redirect()->route('manage')->with('success', 'Account has been deleted successfully');
    }



    // Menampilkan form forgot password
    public function forgot(){
        return view('page.forgot-pass');
    }

}
