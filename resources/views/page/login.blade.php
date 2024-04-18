@extends('layouts.main')

@section('content')
<h1>this is login page</h1>

    <div class="w-50 center border rounded px-3 py-3 mx-auto">
        <h1>Login</h1>
        <form action="/login" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email :</label>
                <br>
                <input type="email" name="email" class="form-controll">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password :</label>
                <br>
                <input type="password" name="password" class="form-controll">
            </div>
            <div class="mb-3 d-grid">
                <button name="submit" type="submit" class="btn btn-primary">Login</button>
            </div>
        </form>
    </div>

@endsection
