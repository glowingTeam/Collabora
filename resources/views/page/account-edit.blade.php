@extends('layouts.main')

@section('content')

<div class="w-50 center border px-3 py-3 mx-auto bg-light p-3 ktk">
        <h1>Edit Account</h1>
        <form action="{{ route('manage-account.update', $accountList) }}" method="GET" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <br>
                <input class="form-control form-control-sm" type="string" name="name_event" id="name" value="{{ $accountList->name }}">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <br>
                <input class="form-control form-control-sm" type="email" name="email" id="email" value="{{ $accountList->email }}">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <br>
                <input class="form-control form-control-sm" type="password" name="password" id="password" value="{{ $accountList->password }}">
            </div>

            <div class="d-flex justify-content-center gap-2">
                <button class="btn btn-primary" type="submit">Edit</button>
                <a href="/account"> <button class="btn btn-danger">Cancel</button> </a>
            </div>
        </form>
    </div>

@endsection
