@extends('layouts.main')

@section('content')

<div class="w-50 center border px-3 py-3 mx-auto bg-light p-3 ktk">
        <h1>Create Event</h1>
        <form action="event" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name Event</label>
                <br>
                <input class="form-control form-control-sm" type="text" name="name_evnt" id="name" required aria-label=".form-control-sm">
            </div>

            <div class="mb-3">
                <label for="location" class="form-label">Location</label>
                <br>
                <input class="form-control form-control-sm" type="text" name="location" id="location" required aria-label=".form-control-sm">
            </div>

            <div class="d-flex mb-3">
                <form>
                    <div class="row form-group">
                        <label for="date" class="">Date</label>
                        <div class="col-sm-7">
                            <div class="input-group date" id="datepicker">
                                <input type="text" class="form-control">
                                <span class="input-group-append">
                                    <span class="input-group-text bg-white d-block">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description Event</label>
                <br>
                <textarea class="form-control" type="text" name="description_event" id="description" required rows="3"></textarea>
            </div>

            <div class="d-flex justify-content-center gap-2">
                <button class="btn btn-success" type="submit">Create</button>
                <button class="btn btn-danger" type="submit">Cancel</button>
            </div>
        </form>
    </div>

    <script type="text/javascript">
        $(function() {
            $('#datepicker').datepicker();
        });
    </script>
@endsection
