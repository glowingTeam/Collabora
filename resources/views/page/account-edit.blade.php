@extends('layouts.main')

@section('content')

<div class="w-50 center border px-3 py-3 mx-auto bg-light p-3 ktk">
        <h1>Edit Account</h1>
        <form action="/account/{{$account->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">nama</label>
                <br>
                <input class="form-control form-control-sm" type="string" name="name" id="name" value="{{ $account->name }}">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <br>
                <input class="form-control form-control-sm" type="email" name="email" id="email" value="{{ $account->email }}">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <br>
                <input class="form-control form-control-sm" type="password" name="password" id="password" value="{{ $account->password }}">
            </div>

            <div class="d-flex justify-content-center gap-2">
                <button class="btn btn-primary" type="submit">Edit</button>
                <a href="/account"> <button class="btn btn-danger">Cancel</button> </a>
            </div>
        </form>
        @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
    </div>

@endsection
