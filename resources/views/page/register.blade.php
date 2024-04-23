@extends('layouts.main')

@section('content')
    <h1>this is register page</h1>
    <div class="w-50 center border rounded px-3 py-3 mx-auto bg-light">
        <h1>Register</h1>
        <form action="/page/register" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name :</label>
                <br>
                <input type="text" name="name" value="{{ Session::get('name') }}" class="form-controll">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email :</label>
                <br>
                <input type="email" name="email" value="{{Session::get('email') }}" class="form-controll">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password :</label>
                <br>
                <input type="password" name="password" class="form-controll">
            </div>
            <div class="mb-3 d-grid">
                <button name="submit" type="submit" class="btn btn-dark">Create Account</button>
            </div>
            <a href="/login" class="center text-dark">Already Have An Account?</a>
        </form>
    </div>

@endsection
