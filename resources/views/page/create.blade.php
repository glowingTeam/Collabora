@extends('layouts.main')

@section('content')
<h1>Create your page here</h1>

<div class="w-50 center border rounded px-3 py-3 mx-auto">
        <h1>Create Event</h1>
        <form action="/create" method="POST">
            @csrf
            <div class="mb-3">
                <label for="controlInput" class="form-label">Name Event</label>
                <br>
                <input class="form-control form-control-sm" type="text" placeholder="name event" aria-label=".form-control-sm">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">location</label>
                <br>
                <input class="form-control form-control-sm" type="text" placeholder="location" aria-label=".form-control-sm">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">category</label>
                <br>
                <select class="form-select" aria-label="Default select example">
                    <option selected>dropdown</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">description</label>
                <br>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <div class="d-flex justify-content-center gap-2">
                <button name="create" type="button" class="btn btn-success">create</button>
                <button name="cancel" type="button" class="btn btn-danger">cancel</button>
            </div>
        </form>
    </div>
    
@endsection