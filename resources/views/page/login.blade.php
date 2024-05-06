@extends('layouts.main')

@section('content')
<div class="d-flex">
    <style>
        
    </style> 
    <div>   
        <br>
        <br>
        <h1>Hello, Colabora!</h1>
        <p>keep connect with us, Please enter your account</p>
        <img src="{{ asset('img/potret.png') }}" alt="Image">
    </div>
    <div class="w-50 center border rounded px-3 py-3 mx-auto bg-light">
        <br>
        <br>
        <br>
        <h1>Login</h1>
        <form action="/masuk" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email :</label>
                <br>
                <input type="email" value="{{ Session::get('email') }}" name="email" class="form-controll">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password :</label>
                <br>
                <input type="password" name="password" class="form-controll">
            </div>
            <div class="mb-3 d-grid">
                <button name="submit" type="submit" class="btn btn-dark">Login</button>
            </div>
            <a href="account/create" class="center text-dark">Create Account</a>
        </form>
    </div>
</div>
@endsection
