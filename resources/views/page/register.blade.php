@extends('layouts.main')

@section('content')
    <h1>this is register page</h1>
    <div class="w-50 center border rounded px-3 py-3 mx-auto bg-light">
        <h1>Register</h1>
        <form action="/account" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name :</label>
                <input class="form-controll form-control-sm" type="text" name="name" id="name">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email :</label>
                <input class="form-controll form-control-sm" type="email" name="email" id="email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password :</label>
                <input class="form-controll form-control-sm" type="password" name="password" id="password">
            </div>
            <div class="mb-3">
                <label for="passwordconfirm" class="form-label">Confirm Password :</label>
                <input class="form-controll form-control-sm" type="password" name="passwordconfirm" id="passwordconfirm">
            </div>
            <div class="mb-3 d-grid">
                <button class="btn btn-dark" type="submit">Create Account</button>
            </div>
            <a href="/account" class="center text-dark">Already Have An Account?</a>
        </form>
    </div>

@endsection