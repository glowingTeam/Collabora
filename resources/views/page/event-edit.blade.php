@extends('layouts.main')

@section('content')
    <div class="w-50 center border px-3 py-3 mx-auto bg-light p-3 ktk mt-5">
        <h1>Edit Event</h1>
        <form action="/event/update/{{ $eventList->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="name" class="form-label">Name Event</label>
                <br>
                <input class="form-control form-control-sm" type="string" name="name_event" id="name"
                    value="{{ $eventList->name_event }}">
            </div>

            <div class="mb-3">
                <label for="location" class="form-label">Location</label>
                <br>
                <input class="form-control form-control-sm" type="text" name="location" id="location"
                    value="{{ $eventList->location }}">
            </div>

            <div class="d-flex mb-3">
                <div class="row form-group">
                    <label for="date" class="">Date</label>
                    <div class="col-sm-7">
                        <input class="form-control" type="date" name="date" id="date"
                            value="{{ $eventList->date }}">
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description Event</label>
                <br>
                <textarea class="form-control" type="text" name="description_event" id="description">{{ $eventList->description_event }}</textarea>
            </div>

            <div class="d-flex justify-content-center gap-2">
                <button class="btn btn-primary" type="submit">Edit</button>
                <a href="/event"> <button class="btn btn-danger">Cancel</button> </a>
            </div>
        </form>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </div>

    <script type="text/javascript">
        $(function() {
            $('#datepicker').datepicker();
        });
    </script>
@endsection
