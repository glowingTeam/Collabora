@extends('layouts.main')

@section('content')

<div class="d-flex justify-content-center align-items-center">
    <div class="card bg-danger" style="width: 25rem; height: 28rem;">
        <img src="..." class="card-img-top" alt="...">
        <div class="card-body text-center">
            <div class="card-body2 bg-white">
                <h2 class="card-title">{{ $eventList->name_event }}</h2>
                <h4 class="card-text">{{ $eventList->location }}</h4>
                <h4 class="card-text">{{ $eventList->date }}</h4>
                <h6 class="card-text">{{ $eventList->description_event }}</h6>
            </div>
            <a href="/event" class="btn btn-primary">Kembali</a>
        </div>
    </div>
</div>

@endsection